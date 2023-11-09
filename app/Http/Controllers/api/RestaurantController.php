<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Address\AddressCollection;
use App\Http\Resources\Address\AddressResource;
use App\Http\Resources\Restaurant\RestaurantCollection;
use App\Http\Resources\Restaurant\RestaurantResource;
use App\Models\Address;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        return new RestaurantCollection(Restaurant::all());
    }

    public function show(Restaurant $restaurant)
    {
        return new RestaurantResource($restaurant);
    }
}
