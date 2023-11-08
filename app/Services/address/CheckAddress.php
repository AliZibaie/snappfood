<?php

namespace App\Services\address;

use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class CheckAddress
{
    public static function check(Address $address)
    {
        if (!Auth::user()->addresses()->first()){
            return response()->json([
                'status'=>false,
                'message'=>'شما آدرسی ندارید',
            ]);
        }
        if (!in_array($address->toArray(), Auth::user()->addresses()->get()->toArray())){
            return response()->json([
                'status'=>false,
                'message'=>'آدرس انتخابی متعلق به شما نیست!',
            ]);
        }
        return null;
    }
}
