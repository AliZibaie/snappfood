<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cart\CartCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CartController extends Controller
{
    public function index()
    {
        $carts = Redis::get('carts');
        if ($carts) {
            return response()->json(['carts' => json_decode($carts)]);
        }
        Redis::set('carts', $carts->toJson());
        return new CartCollection($carts);
    }

}
