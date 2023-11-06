<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\address\StoreAddressRequest;
use App\Http\Resources\AddressCollection;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use Illuminate\Http\Request;
use Mockery\Exception;

class AddressController extends Controller
{
    public function index(Request $request)
    {
        return new AddressCollection(Address::all());
    }


}
