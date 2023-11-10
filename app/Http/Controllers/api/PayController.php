<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\Pay\StorePayRequest;
use App\Models\Cart;
use App\Models\Pay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class PayController extends Controller
{
    public function store(StorePayRequest $request, Cart $cart)
    {
        try
        {
            $data = ['total'=>$cart->food->price * $cart->count, 'cart_id'=> $cart->id];
            Pay::query()->create($data);
            Cart::query()->where('id', $cart->id)->delete();
            return response()->json([
                'status'=>true,
                'message'=>'پرداخت شما با موفقیت انجام شد.',
            ]);
        }catch (Exception $e){
            return response()->json([
                'status'=>false,
                'message'=>'خظا در  پرداخت',
            ], 500);
        }
    }
}
