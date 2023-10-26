<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class ManageSellerController extends Controller
{
    public function index()
    {
        $sellers = User::role('seller')->get();
//        $users = User::role('user')->get();
//        $admins = User::role('admin')->get();
        dd($sellers);
    }
}
