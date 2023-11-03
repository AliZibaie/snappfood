<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Category\StoreRestaurantCategoryRequest;
use App\Http\Requests\Category\UpdateRestaurantCategoryRequest;
use App\Models\RestaurantCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;


class RestaurantCategoryController extends Controller
{
    public function index()
    {
        $restaurantCategories = RestaurantCategory::all();
        return view('panel.admin.restaurantCategories.index', compact('restaurantCategories'));
    }


    public function edit(RestaurantCategory $restaurantCategory)
    {
        return view('panel.admin.restaurantCategories.edit', compact('restaurantCategory'));
    }

    public function update(UpdateRestaurantCategoryRequest $request, int $id)
    {
        try {
            RestaurantCategory::query()->where('id', '=', $id)->update($request->validated());
            return redirect('/panel/admin/restaurantCategories')->with('success', 'دسته بندی مورد نظر با موفقیت تغییر یافت .');
        }catch (Exception $e){
            return redirect('restaurantCategories', status: 500)->with('fail', 'خطا در تغییر دسته بندی');
        }
    }

    public function destroy(int $id)
    {
        try {
            RestaurantCategory::query()->where('id', '=',  $id)->delete();
            return redirect('/panel/admin/restaurantCategories')->with('success', 'دسته بندی مورد نظر با موفقیت حذف  شد .');
        }catch (Exception $e){
            return redirect('restaurantCategories', status: 500)->with('fail', 'خطا در حذف دسته بندی');
        }
    }

    public function create()
    {
        return view('panel.admin.restaurantCategories.create');
    }

    public function store(StoreRestaurantCategoryRequest $request)
    {
        try {
            RestaurantCategory::create($request->validated());
            return redirect('/panel/admin/restaurantCategories')->with('success', 'دسته بندی مورد نظر با موفقیت ایجاد شد.');
        }catch (Exception $e){
            return redirect('restaurantCategories', status: 500)->with('fail', 'خطا در ایجاد دسته بندی');
        }
    }
}
