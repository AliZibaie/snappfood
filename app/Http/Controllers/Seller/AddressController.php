<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Address\StoreAddressRequest;
use App\Http\Requests\Address\UpdateAddressRequest;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index()
    {
        return view('panel.seller.addresses/index');
    }
    public function create()
    {
        return view('panel.seller.addresses.create');
    }

    public function store(StoreAddressRequest $request)
    {
        try {
            Auth::user()->restaurant->address()->create($request->validated());
            return redirect('/panel/seller/restaurants')->with('success', 'ادرس مورد نظر با موفقیت ایجاد شد.');
        }catch (\Throwable $exception){
            return redirect('/panel/seller/restaurants', status: 500)->with('fail', 'خطا در ایجاد آدرس');
        }

    }

    public function update(UpdateAddressRequest $request)
    {
        try {
            Auth::user()->restaurant->address()->update($request->validated());
            return redirect('/panel/seller/restaurants')->with('success', 'ادرس مورد نظر با موفقیت بروزرسانی شد.');
        }catch (\Throwable $exception){
            return redirect('/panel/seller/restaurants', status: 500)->with('fail', 'خطا در برزورسانی آدرس');
        }

    }

    public function edit(Address $address)
    {
        return view('panel.seller.addresses.edit', compact('address'));
    }
}
