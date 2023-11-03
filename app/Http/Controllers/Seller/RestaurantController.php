<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\StoreRestaurantRequest;
use App\Http\Requests\Restaurant\UpdateRestaurantRequest;
use App\Models\FoodCategory;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Ramsey\Collection\Collection;


class RestaurantController extends Controller
{
    public function __construct()
    {
        $this->middleware('stop_creating_restaurant')->only('create');
    }

    public function index()
    {
        return view('panel.seller.restaurants.index');
    }

    public function updateStatus(Request $request)
    {

        try {
            Restaurant::query()->where('id', Auth::user()->restaurant->id)->update(['status'=> $request->input('status')]);
            return redirect('panel/seller/restaurants')->with('success', 'تنظیمات رستوران با موفقیت به‌روزرسانی شد');
        }catch (Exception $e){
            return redirect('panel/seller/restaurants')->with('fail', 'خطا در به‌روزرسانی تنظیمات رستوران');
        }

    }

        public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        try {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageFileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('public/images/restaurants', $imageFileName);
                    $oldImagePath = str_replace('storage/', '', $restaurant->image->url);
                    Storage::delete('public/' . $oldImagePath);
                $restaurant->image()->delete();
                $restaurant->image()->create(['url' => 'storage/images/restaurants/'.$imageFileName]);
            }
            $restaurant->update($request->validated());
            $restaurant->foodCategories()->sync($request->validated()['food_id']);
            return redirect('panel/seller/restaurants')->with('success', 'تنظیمات رستوران با موفقیت به‌روزرسانی شد');
        } catch (Exception $e) {
            return redirect('panel/seller/restaurants')->with('fail', 'خطا در به‌روزرسانی تنظیمات رستوران');
        }
    }


    public function edit(Restaurant $restaurant)
    {
        $selectedCategoryIds = $restaurant->foodCategories()->pluck('id')->all();
        $foodCategories = FoodCategory::whereNotIn('id', $selectedCategoryIds)->get();
        return view('panel.seller.restaurants.edit', compact('restaurant', 'foodCategories'));
    }

    public function store(StoreRestaurantRequest $request)
    {
        try {
            $data = $request->except(['_token', 'image', 'food_id']);
            $restaurant = Restaurant::create($data);

            $foodIds = $request->input('food_id', []);
            $restaurant->foodCategories()->attach($foodIds);

            $image = $request->file('image');
            $imageFileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/images/restaurants', $imageFileName);
            $restaurant->image()->create(['url' => 'storage/images/restaurants/'.$imageFileName]);

            return redirect('panel/seller/restaurants')->with('success', 'رستوران شما با موفقیت افتتاح گردید');
        } catch (Exception $e) {
            return redirect('panel/seller/restaurants')->with('fail', 'خطا در افتتاح رستوران');
        }
    }

    public function create()
    {
        $restaurantsCategories = RestaurantCategory::all();
        $foodCategories = FoodCategory::all();
        return view('panel.seller.restaurants.create', compact('restaurantsCategories', 'foodCategories'));
    }

    public function destroy(Request $request, Restaurant $restaurant)
    {
        try {
            $restaurant->foodCategories()->detach();
            Storage::delete('public/' . $restaurant->image->url);
            $restaurant->image()->delete();
            Restaurant::query()->where('id', $restaurant->id)->delete();
            return redirect('panel/seller/restaurants')->with('success', 'رستوران شما با موفقیت حذف گردید');
        }catch (Exception $e){
            return redirect('panel/seller/restaurants')->with('fail', 'خطا در حذف رستوران');
        }
    }

}
