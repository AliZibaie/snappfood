<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FoodPartyController extends Controller
{
    public function index()
    {
        return view('panel.seller.foodParties.index');
    }
}
