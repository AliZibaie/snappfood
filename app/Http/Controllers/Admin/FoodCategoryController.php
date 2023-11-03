<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreFoodCategoryRequest;
use App\Http\Requests\Category\StoreRestaurantCategoryRequest;
use App\Http\Requests\Category\UpdateFoodCategoryRequest;
use App\Http\Requests\Category\UpdateRestaurantCategoryRequest;
use App\Models\FoodCategory;
use App\Models\RestaurantCategory;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class FoodCategoryController extends Controller
{
    public function index()
    {
        $foodCategories = FoodCategory::all();
        return view('panel.admin.foodCategories.index', compact('foodCategories'));
    }


    public function edit(FoodCategory $foodCategory)
    {
        return view('panel.admin.foodCategories.edit', compact('foodCategory'));
    }

    public function update(UpdateFoodCategoryRequest $request, int $id)
    {
        try {
            FoodCategory::query()->where('id', '=', $id)->update($request->validated());
            return redirect('/panel/admin/foodCategories')->with('success', 'دسته بندی مورد نظر با موفقیت تغییر یافت .');
        }catch (Exception $e){
            return redirect('foodCategories', status: 500)->with('fail', 'خطا در تغییر دسته بندی');
        }
    }

    public function destroy(int $id)
    {
        try {
            FoodCategory::query()->where('id', '=',  $id)->delete();
            return redirect('/panel/admin/foodCategories')->with('success', 'دسته بندی مورد نظر با موفقیت حذف  شد .');
        }catch (Exception $e){
            return redirect('foodCategories', status: 500)->with('fail', 'خطا در حذف دسته بندی');
        }
    }

    public function create()
    {
        return view('panel.admin.foodCategories.create');
    }

    public function store(StoreFoodCategoryRequest $request)
    {
        try {
            FoodCategory::create($request->validated());
            return redirect('/panel/admin/foodCategories')->with('success', 'دسته بندی مورد نظر با موفقیت ایجاد شد.');
        }catch (Exception $e){
            return redirect('foodCategories', status: 500)->with('fail', 'خطا در ایجاد دسته بندی');
        }
    }
}
