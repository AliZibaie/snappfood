@extends('layouts.simple')
@section('content')
    @if(Auth::user()->restaurant)
        <form method="post" action="{{route('foods.store')}}" class="w-2/3 mx-auto mt-8" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                @error('name')
                <p class="text-xl text-red-700 my-4">{{$message}}</p>
                @enderror
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نام غذا</label>
                <input type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="name" value="{{old('name')}}">
            </div>

            <div class="mb-6">
                @error('foodCategory_id')
                <p class="text-xl text-red-700 my-4">{{$message}}</p>
                @enderror
                <select  id="foodCategory_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="foodCategory_id">
                    <option value="" selected disabled>انتخاب دسته بندی غذا</option>
                    @forelse($foodCategories as $foodCategory)
                        <option value="{{$foodCategory->id}}">{{$foodCategory->food_type}}</option>
                    @empty
                        <p class="text-xl text-center mx-auto text-red-600">هنوز دسته بندی برای غذا وجود ندارد.</p>
                    @endforelse
                </select>
            </div>

            <div class="mb-6">
                @error('price')
                <p class="text-xl text-red-700 my-4">{{$message}}</p>
                @enderror
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">هزینه</label>
                <input type="text" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="price" value="{{old('price')}}">
            </div>

            <div class="mb-6">
                @error('raw_materials')
                <p class="text-xl text-red-700 my-4">{{$message}}</p>
                @enderror
                <label for="raw_materials" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">مواد لازم (اختیاری)</label>
                <input type="text" id="raw_materials" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="raw_materials" value="{{old('raw_materials')}}">
            </div>
            <div class="mb-6">
                @error('image')
                <p class="text-xl text-red-700 my-4">{{$message}}</p>
                @enderror
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">
                    عکس غذا(اختیاری)
                </label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="image" type="file" name="image">
            </div>
            <input type="hidden" name="restaurant_id" value="{{Auth::user()->restaurant->id}}">

            <div class="flex justify-between">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ذخیره</button>
                <a href="{{route('foods.index')}}"  class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">برگشت</a>
            </div>
        </form>
    @else
        <div class="h-[calc(100vh)] w-full bg-gray-900">
            <div class="w-96 mx-auto pt-8 space-y-12">

                <h1 class="text-xl text-center mx-auto text-red-600">شما هنوز رستورانی افتتاح نکرده اید! لطفا اول افتتاح کنید بعد غذا تعریف کنید</h1>
                <div class="flex justify-between">
                    <a href="{{route('restaurants.create')}}"  class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">افتتاح حساب</a>
                    <a href="{{route('foods.index')}}"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">برگشت</a>
                </div>
            </div>
        </div>
    @endif

@endsection
