<?php

namespace App\Http\Controllers;

use App\Http\Requests\Restaurant\StoreRestaurantRequest;
use App\Http\Requests\StoreSellerRequest;
use App\Models\RestaurantCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Exception;

class SellerController extends Controller
{
    public function create()
    {
        return view('requests.seller.create');
    }

    public function store(StoreSellerRequest $request)
    {
        try {
            $user = User::query()->where('email', Auth::user()->email)->update($request->validated());
            Auth::user()->assignRole('seller');
            return redirect('requests/sellers/create')->with('success', 'شما با موفقیت برای فروشندگی ثبت نام شدید.');
        }catch (Exception $e){
            return redirect('requests/sellers/create')->with('fail', 'خطا در ثبت نام.');
        }
    }
}
