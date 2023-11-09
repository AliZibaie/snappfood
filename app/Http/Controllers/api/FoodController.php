<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Food\FoodCollection;
use App\Http\Resources\Food\FoodResource;
use App\Models\Food;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index(Restaurant $restaurant)
    {
        return new FoodCollection($restaurant->foods);
    }

    public function show(Food $food)
    {
        return new FoodResource($food);
    }
}
