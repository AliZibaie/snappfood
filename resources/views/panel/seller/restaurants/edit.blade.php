@extends('layouts.simple')
@section('content')
    <div class="bg-gray-900 m-0 px-8 py-12">
        <form method="post" action="{{route('restaurants.update', $restaurant)}}" class="w-2/3 mx-auto mt-8" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                @error('name')
                <p class="text-xl text-red-700 my-4">{{$message}}</p>
                @enderror
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نام رستوران</label>
                <input type="text" id="name" class="bg-gray-800 border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="name" value="{{$restaurant->name}}">
            </div>

            <div class="mb-6">
                @error('address')
                <p class="text-xl text-red-700 my-4">{{$message}}</p>
                @enderror
                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">آدرس رستوران</label>
                <input type="text" id="address" class="bg-gray-800 text-white border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="address" value="{{$restaurant->address}}">
            </div>

            <div class="mb-6">
                @error('phone')
                <p class="text-xl text-red-700 my-4">{{$message}}</p>
                @enderror
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">شماره تماس رستوران</label>
                <input type="text" id="phone" class="bg-gray-800 text-white border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="phone" value="{{$restaurant->phone}}">
            </div>



            <div class="mb-6">
                @error('food_id')
                <p class="text-xl text-red-700 my-4">{{$message}}</p>
                @enderror
                <select  id="food_type" class="bg-gray-800 text-white border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="food_id[]" multiple >
                    <option value="" selected disabled>انتخاب دسته بندی غذا</option>
                    @forelse($restaurant->foodCategories as $foodCategory)
                        <option value="{{$foodCategory->id}}" selected>{{$foodCategory->food_type}}</option>
                    @empty
                        <p class="text-xl text-center mx-auto text-red-600">هنوز دسته بندی برای غذا وجود ندارد.</p>
                    @endforelse
                    @forelse($foodCategories as $foodCategory)
                        <option value="{{$foodCategory->id}}" >{{$foodCategory->food_type}}</option>
                    @empty
                        <p class="text-xl text-center mx-auto text-red-600">هنوز دسته بندی برای غذا وجود ندارد.</p>
                    @endforelse
                </select>
            </div>

            <div class="mb-6">
                @error('account_number')
                <p class="text-xl text-red-700 my-4">{{$message}}</p>
                @enderror
                <label for="account_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">شماره حساب</label>
                <input type="number" id="account_number" class="bg-gray-800 text-white border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="account_number" value="{{$restaurant->account_number}}">
            </div>

            <div class="mb-6">
                @error('sending_price')
                <p class="text-xl text-red-700 my-4">{{$message}}</p>
                @enderror
                <label for="sending_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">هزینه ارسال سفارشات</label>
                <input type="number" id="sending_price" class="bg-gray-800 text-white border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="sending_price" value="{{$restaurant->sending_price}}">
            </div>

            <div class="mb-6">
                @error('open_time')
                <p class="text-xl text-red-700 my-4">{{$message}}</p>
                @enderror
                <label for="open_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ساعت شروع رستوران</label>
                <input type="time" id="open_time" class="bg-gray-800 text-white border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="open_time" value="{{$restaurant->open_time}}">
            </div>

            <div class="mb-6">
                @error('close_time')
                <p class="text-xl text-red-700 my-4">{{$message}}</p>
                @enderror
                <label for="close_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ساعت پایان رستوران</label>
                <input type="time" id="close_time" class="bg-gray-800 text-white border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="close_time" value="{{$restaurant->close_time}}">
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
                <a href="{{route('restaurants.index')}}"  class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-blue-800">برگشت</a>
            </div>
        </form>

    </div>
@endsection
