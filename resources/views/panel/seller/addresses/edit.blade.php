@extends('layouts.simple')
@section('content')
    <form method="post" action="{{route('addresses.update', Auth::user()->restaurant->address)}}" class="w-2/3 mx-auto mt-8" enctype="multipart/form-data">
        @csrf
        @method("PATCH")
        <div class="mb-6">
            @error('title')
            <p class="text-xl text-red-700 my-4">{{$message}}</p>
            @enderror
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">عنوان ادرس</label>
            <input type="text" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="title" value="{{$address->title}}">
        </div>

        <div class="mb-6">
            @error('address')
            <p class="text-xl text-red-700 my-4">{{$message}}</p>
            @enderror
            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> ادرس</label>
            <input type="text" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="address" value="{{$address->address}}">
        </div>

        <div class="mb-6">
            @error('longitude')
            <p class="text-xl text-red-700 my-4">{{$message}}</p>
            @enderror
            <label for="longitude" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">طول جغرافیایی</label>
            <input type="text" id="longitude" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="longitude" value="{{$address->longitude}}">
        </div>
        <div class="mb-6">
            @error('latitude')
            <p class="text-xl text-red-700 my-4">{{$message}}</p>
            @enderror
            <label for="latitude" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">عرض جغرافیایی</label>
            <input type="text" id="latitude" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="latitude" value="{{$address->latitude}}">
        </div>

        <div class="flex justify-between">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ذخیره</button>
            <a href="{{route('restaurants.index')}}">برگشت</a>
        </div>
    </form>

@endsection
