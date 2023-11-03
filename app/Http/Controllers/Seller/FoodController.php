<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreFoodCategoryRequest;
use App\Http\Requests\Category\UpdateFoodCategoryRequest;
use App\Http\Requests\Food\StoreFoodRequest;
use App\Http\Requests\Food\UpdateFoodRequest;
use App\Models\Discount;
use App\Models\Food;
use App\Models\FoodCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Exception;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Auth::user()->foods()->paginate(3);
        return view('panel.seller.foods.index', compact('foods'));
    }


    public function edit(Food $food)
    {
        $selectedCategoryId = $food->foodCategory()->first()->id;
        $foodCategories = FoodCategory::whereNot('id', $selectedCategoryId)->get();
        return view('panel.seller.foods.edit', compact('food', 'foodCategories'));
    }

    public function update(UpdateFoodRequest $request, Food $food)
    {
        try {
            $food->update($request->validated());
            if ($image = $request->file('image')){
                $imageFileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('public/images/foods', $imageFileName);
                $oldImagePath = str_replace('storage/', '', $food->image->url);
                Storage::delete('public/' . $oldImagePath);
                $food->image()->delete();
                $food->image()->create(['url' => 'storage/images/foods/'.$imageFileName]);
            }
            return redirect('/panel/seller/foods')->with('success', 'غذای  مورد نظر با موفقیت تغییر یافت .');
        }catch (Exception $e){
            return redirect('/panel/seller/foods', status: 500)->with('fail', 'خطا در تغییر غذا ');
        }
    }

    public function destroy(int $id)
    {
        try {
            Food::query()->where('id', '=',  $id)->delete();

            return redirect('/panel/seller/foods')->with('success', 'غذای مورد نظر با موفقیت حذف  شد .');
        }catch (Exception $e){
            return redirect('foods', status: 500)->with('fail', 'خطا در حذف غذا ');
        }
    }

    public function create()
    {
        $foodCategories = FoodCategory::all();
        return view('panel.seller.foods.create', compact('foodCategories'));
    }

    public function store(StoreFoodRequest $request)
    {
        try {
            $newFood =
                [
                    'name'=>$request->input('name'),
                    'price'=>$request->input('price'),
                    'raw_materials'=>$request->input('raw_materials'),
                    'restaurant_id'=>$request->input('restaurant_id') ?? null,
                    'food_category_id'=>$request->input('foodCategory_id') ,
                ];
            $food = Food::create($newFood);
            if ($image = $request->file('image')){
                $imageFileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('public/images/foods', $imageFileName);
                $food->image()->create(['url' => 'storage/images/foods/'.$imageFileName]);
            }
            return redirect('/panel/seller/foods')->with('success', 'غذای مورد نظر با موفقیت ایجاد شد.');
        }catch (Exception $e){
            return redirect('/panel/seller/foods', status: 500)->with('fail', 'خطا در ایجاد غذا');
        }
    }

    public function show(Food $food)
    {
        $discounts = Discount::all();
        return view('panel.seller.foods.show', compact('food', 'discounts'));
    }

    public function assignDiscount()
    {

    }
}
