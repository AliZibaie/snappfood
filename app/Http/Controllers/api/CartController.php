<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\Cart\StoreFoodCartRequest;
use App\Http\Resources\Cart\CartCollection;
use App\Http\Resources\Cart\CartResource;
use App\Models\Cart;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Mockery\Exception;


class CartController extends Controller
{
    public function index()
    {
        return new CartCollection(Cart::all());
    }

    public function store(StoreFoodCartRequest $request)
    {
        try
        {
            $data = ['food_id' =>$request->input('id'), 'count'=> $request->input('count'), 'restaurant_id'=>Food::find($request->input('id'))->restaurant_id];
             Cart::query()->create($data);
            return response()->json([
                'status'=>true,
                'message'=>'سبد خرید شما با موفقیت افزوده شد.',
            ]);
        }catch (Exception $e){
            return response()->json([
                'status'=>false,
                'message'=>'خظا در افزودن سبدخرید',
            ], 500);
        }
    }

    public function update(StoreFoodCartRequest $request, Cart $cart)
    {

        try
        {
            $data = ['food_id' =>$request->input('id'), 'count'=> $request->input('count'), 'restaurant_id'=>Food::find($request->input('id'))->restaurant_id ];
            Cart::query()->where('id', $cart->id)->update($data);
            return response()->json([
                'status'=>true,
                'message'=>'سبد خرید شما با موفقیت بروزرسانی شد.',
            ]);
        }catch (Exception $e){
            return response()->json([
                'status'=>false,
                'message'=>'خظا در بروزرسانی سبدخرید',
            ], 500);
        }
    }

    public function show(Cart $cart)
    {
        return new CartResource($cart);
    }
}
