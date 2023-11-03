@extends('layouts.simple')
@section('content')
    <form method="post" action="{{route('banners.update', $banner)}}" class="w-2/3 mx-auto mt-8" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-6">
            @error('title')
            <p class="text-xl text-red-700 my-4">{{$message}}</p>
            @enderror
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">عنوان بنر</label>
            <input type="text" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="title" value="{{$banner->title}}">
        </div>

        <div class="mb-6">
            @error('alt')
            <p class="text-xl text-red-700 my-4">{{$message}}</p>
            @enderror
            <label for="alt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">متن جایگزین</label>
            <input type="text" id="alt" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="alt" value="{{$banner->alt}}">
        </div>

        <div class="mb-6">
            @error('image')
            <p class="text-xl text-red-700 my-4">{{$message}}</p>
            @enderror
            <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">آپلود عکس</label>
            <input type="file" id="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="image" value="">
        </div>

        <div class="flex justify-between">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ذخیره</button>
            <a href="{{route('banners.index')}}">برگشت</a>
        </div>
    </form>

@endsection
