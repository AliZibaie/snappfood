<?php

namespace App\Http\Controllers\seller;

use App\Enums\Day;
use App\Http\Controllers\Controller;
use App\Http\Requests\Day\StoreDayRequest;
use App\Models\FoodCategory;
use App\Models\Restaurant;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchduleController extends Controller
{
    public function index()
    {
        return view('panel.seller.schedules.index');
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function create()
    {
        $days = Day::getValues();
        return view('panel.seller.schedules.create', compact( 'days'));
    }

    public function store(StoreDayRequest $request)
    {
        try {
            $data = $request->validated();
            foreach ($data['day'] as $day) {
                Auth::user()->restaurant->schedules()->create(['day'=>$day, 'open'=>$data['open'], 'close'=>$data['close']]);
            }
            return redirect('/panel/seller/restaurants')->with('success', 'ساعت کاری با موفقیت ایجاد شد');
        }catch (\Throwable $exception){
            return redirect('/panel/seller/restaurants', status: 500)->with('fail', 'خطا در ایجاد ساعت کاری');
        }
    }
}
