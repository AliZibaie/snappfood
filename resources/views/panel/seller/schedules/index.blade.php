
@extends('layouts.simple')
@section('content')
    @if(Auth::user()->restaurant->schedules->toArray())
        <div class="flex flex-col items-center justify-center min-h-screen bg-gray-900">
            <!-- dark theme -->
            <div class="container  m-4">
                <div class="max-w-3xl w-full mx-auto grid gap-4 grid-cols-1">
                    <h1 class="text-xl text-center text-green-700">آدرس : {{Auth::user()->restaurant->address->address}}</h1>
                    <h1 class="text-xl text-center text-green-700">عنوان : {{Auth::user()->restaurant->address->title}}</h1>
                    <h1 class="text-xl text-center text-green-700">عرض : {{Auth::user()->restaurant->address->latitude}}</h1>
                    <h1 class="text-xl text-center text-green-700">طول : {{Auth::user()->restaurant->address->longitude}}</h1>

                    <div class="flex justify-between">
                        <a href="{{route('restaurants.index')}}" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">برگشت</a>
                        <a href="{{route('schedules.edit', Auth::user()->restaurant->address)}}" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">تغییر آدرس</a>

                    </div>

                </div>
            </div>

            @else
                <div class="h-[calc(100vh)] w-full bg-gray-900">
                    <div class="w-96 mx-auto pt-8 space-y-12">

                        <h1 class="text-xl text-center mx-auto text-green-600">شما هنوز ساعت اداری ای ندارید</h1>
                        <div class="flex justify-between">
                            <a href="{{route('dashboard')}}" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">برگشت</a>
                            <a href="{{route('schedules.create')}}" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">افزودن ساعت اداری</a>

                        </div>
                    </div>
                </div>
            @endif
            @if(session('success'))
                <p class="text-green-700 text-xl text-center">{{session('success')}}</p>
            @elseif(session('fail'))
                <p class="text-red-700 text-xl text-center">{{session('fail')}}</p>
    @endif
@endsection
