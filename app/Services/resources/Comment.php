<?php

namespace App\Services\resources;

use App\Models\Cart;
use App\Models\RestaurantCategory;
use Illuminate\Support\Facades\Auth;

class Comment
{
    public static function filter()
    {
        $food_id = request('food_id');
        $restaurant_id = request('restaurant_id');
        $query = \App\Models\Comment::query();

        if ($food_id) {
            $query->where('food_id', $food_id);
        }

        if ($restaurant_id && !isset($food_id)) {
            dd($restaurant_id);
            $query->where('restaurant_id', $restaurant_id);
        }

        if (!isset($restaurant_id) && !isset($food_id)) {
            abort(500);
        }

        return $query->get();
    }

    public static function prepareData($request)
    {
        $data = $request->validate([
            'score'=>'required',
            'content'=>'required',
            'cart_id'=>'required',
        ]);
        $cart = Cart::find($request->input()['cart_id']);
        $restaurant_id = $cart->restaurant_id;
        $food_id = $cart->food_id;
        $data['restaurant_id'] = $restaurant_id;
        $data['food_id'] = $food_id;
        $data['user_id'] = Auth::id();
        return $data;
    }
}
