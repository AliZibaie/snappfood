<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function test()
    {
        dd($this->userRepository->first());
    }
}
