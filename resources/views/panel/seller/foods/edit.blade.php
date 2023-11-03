@extends('layouts.simple')
@section('content')
    <div class="bg-gray-900 m-0 px-8 py-12">
        <form method="post" action="{{route('foods.update', $food)}}" class="w-2/3 mx-auto mt-8 mb-36" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                @error('name')
                <p class="text-xl text-red-700 my-4">{{$message}}</p>
                @enderror
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نام غذا</label>
                <input type="text" id="name" class="bg-gray-800 border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="name" value="{{$food->name}}">
            </div>

            <div class="mb-6">
                @error('price')
                <p class="text-xl text-red-700 my-4">{{$message}}</p>
                @enderror
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    هزینه ی غذا
                </label>
                <input type="text" id="price" class="bg-gray-800 text-white border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="price" value="{{$food->price}}">
            </div>

            <div class="mb-6">
                @error('raw_materials')
                <p class="text-xl text-red-700 my-4">{{$message}}</p>
                @enderror
                <label for="raw_materials" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">مواد لازم</label>
                <input type="text" id="raw_materials" class="bg-gray-800 text-white border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="raw_materials" value="{{$food->raw_materials}}">
            </div>



            <div class="mb-6">
                @error('food_category_id')
                <p class="text-xl text-red-700 my-4">{{$message}}</p>
                @enderror
                <select  id="food_category_id" class="bg-gray-800 text-white border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="food_category_id">
                    <option value="" selected disabled>انتخاب دسته بندی غذا</option>
                        <option value="{{$food->foodCategory->id}}" selected>{{$food->foodCategory->food_type}}</option>
                    @forelse($foodCategories as $foodCategory)
                        <option value="{{$foodCategory->id}}" >{{$foodCategory->food_type}}</option>
                    @empty
                        <p class="text-xl text-center mx-auto text-red-600">هنوز دسته بندی برای غذا وجود ندارد.</p>
                    @endforelse
                </select>
            </div>



            <div class="mb-6">
                @error('image')
                <p class="text-xl text-red-700 my-4">{{$message}}</p>
                @enderror
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">
                    عکس رستوران
                </label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-900 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 " id="image" type="file" name="image">

            </div>
            <input type="hidden" name="user_id" value="{{Auth::id()}}">

            <div class="flex justify-between">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ذخیره</button>
                <a href="{{route('foods.index')}}"  class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-blue-800">برگشت</a>
            </div>
        </form>

    </div>
@endsection
