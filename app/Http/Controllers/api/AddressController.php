<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\address\StoreAddressRequest;
use App\Http\Requests\api\address\UpdateAddressRequest;
use App\Http\Resources\AddressCollection;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use App\Models\User;
use App\Services\address\CheckAddress;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class AddressController extends Controller
{
    public function index(Request $request)
    {
        return new AddressCollection(Address::all());
    }

    public function show(Address $address)
    {
        return new AddressResource($address);
    }

    public function store(StoreAddressRequest $request)
    {
        try
        {
            Auth::user()->addresses()->create($request->input());
            return response()->json([
                'status'=>true,
                'message'=>'آدرس شما با موفقیت افزوده شد.',
            ]);
        }catch (Exception $e){
            return response()->json([
                'status'=>false,
                'message'=>'خظا در افزودن آدرس',
            ], 500);
        }
    }

    public function update(Address $address)
    {
        try
        {
            if (CheckAddress::check($address)){
                return CheckAddress::check($address);
            }
            Auth::user()->addresses()->update(['is_default'=>0]);
            Address::query()->where('id', $address->id)->update(['is_default'=>1]);
            return response()->json([
                'status'=>true,
                'message'=>'آدرس شما با موفقیت به آدرس پیش فرض تبدیل شد.',
            ]);
        }catch (Exception $e){
            return response()->json([
                'status'=>false,
                'message'=>'خظا در آپدیت آدرس',
            ], 500);
        }
    }

    public function destroy(Address $address)
    {
        try
        {
            if (CheckAddress::check($address)){
                return CheckAddress::check($address);
            }
            Address::query()->where('id', $address->id)->delete();
            return response()->json([
                'status'=>true,
                'message'=>'آدرس شما با موفقیت حذف شد.',
            ]);
        }catch (Exception $e){
            return response()->json([
                'status'=>false,
                'message'=>'خظا در حذف آدرس',
            ], 500);
        }
    }
}
