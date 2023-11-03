<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Discount\StoreDiscountRequest;
use App\Http\Requests\Discount\UpdateDiscountRequest;
use App\Models\Discount;
use Exception;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::all();
        return view('panel.admin.discounts.index', compact('discounts'));
    }


    public function edit(Discount $discount)
    {
        return view('panel.admin.discounts.edit', compact('discount'));
    }

    public function update(UpdateDiscountRequest $request, int $id)
    {
        try {
            Discount::query()->where('id', '=', $id)->update($request->validated());
            return redirect('/panel/admin/discounts')->with('success', ' تخفیف مورد نظر با موفقیت تغییر یافت .');
        }catch (Exception $e){
            return redirect('discounts', status: 500)->with('fail', 'خطا در تغییر تخفیف');
        }
    }

    public function destroy(int $id)
    {
        try {
            Discount::query()->where('id', '=',  $id)->delete();
            return redirect('/panel/admin/discounts')->with('success', 'تخفیف  مورد نظر با موفقیت حذف  شد .');
        }catch (Exception $e){
            return redirect('discounts', status: 500)->with('fail', 'خطا در حذف دسته بندی');
        }
    }

    public function create()
    {
        return view('panel.admin.discounts.create');
    }

    public function store(StoreDiscountRequest $request)
    {
        try {
            Discount::create($request->validated());
            return redirect('/panel/admin/discounts')->with('success', ' تخفیف مورد نظر با موفقیت ایجاد شد.');
        }catch (Exception $e){
            return redirect('/panel/admin/discounts', status: 500)->with('fail', 'خطا در ایجاد تخفیف ');
        }
    }
}
