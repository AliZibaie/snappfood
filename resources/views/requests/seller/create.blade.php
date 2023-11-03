@extends('layouts.auth')
@section('authentication-form')
    <h1 class="text-xl text-center mt-6 mb-12">درخواست فروشندگی</h1>
    <form method="post" action="{{route('sellers.store')}}" dir="rtl" class=" mx-auto w-5/6 mt-3">
        @csrf
        <div class="grid gap-6 mb-6 md:grid-cols-2">

            <div>
                <label for="full_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نام کامل</label>
                <input type="text" id="full_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " value="{{Auth::user()->name}}" disabled>
            </div>
            @error('name')
            <p class="text-xl text-start text-red-800">{{$message}}</p>
            @enderror
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">آدرس ایمیل</label>
                <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" value="{{Auth::user()->email}}" disabled >
            </div>
            @error('email')
            <p class="text-xl text-start text-red-800">{{$message}}</p>
            @enderror
            <div class="mb-6">
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">شماره همراه</label>
                <input type="text" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" name="phone">
            </div>
        </div>
        @error('phone')
        <p class="text-xl text-start text-red-800">{{$message}}</p>
        @enderror

        <div class="flex justify-between">
            <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-blue-800">ذخیره</button>

            <a href="{{route('home')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">برگشت</a>
        </div>
        @if(session('success'))
            {{session('success')}}
        @elseif(session('fail'))
            {{session('fail')}}
        @endif
    </form>
@endsection
