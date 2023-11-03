@extends('layouts.simple')
@section('content')

    <form method="post" action="{{route('discounts.store')}}" class="w-2/3 mx-auto mt-8">
        @csrf

        <div class="mb-6">
            @error('amount')
            <p class="text-xl text-red-700 my-4">{{$message}}</p>
            @enderror
            <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">مقدار کد تخفیف</label>
            <input type="number" id="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="amount" value="{{old('amount')}}"   >
        </div>
        <div class="mb-6">
            @error('expire_time')
            <p class="text-xl text-red-700 my-4">{{$message}}</p>
            @enderror
            <label for="expire_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">انقضا(ساعت)</label>
            <input type="number" id="expire_time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="expire_time" value="{{old('expire_time')}}"   >
        </div>
        <div class="mb-6">
            @error('code')
            <p class="text-xl text-red-700 my-4">{{$message}}</p>
            @enderror
            <label for="code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">کد تخفیف</label>
            <input type="text" id="code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="code" value="{{old('code')}}"   >
        </div>
        <div class="flex justify-between">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ذخیره</button>
            <a href="{{route('discounts.index')}}"  class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-blue-800">برگشت</a>
        </div>
    </form>
@endsection
