@extends('layouts.simple')
@section('content')
    @include('components.navbar')
    <div class="border-2  border-[#5F9C9F]  rounded-3xl mx-auto mt-5 h-[calc(100vh-10rem)] w-5/6 flex space-x-4 bg-[#90c5a9] p-4">
        @role('admin')
        <a href="{{route('restaurantCategories.index')}}" class="border-2 bg-[#7A9A95] rounded-3xl w-40 h-20 m-0 flex justify-center items-center">
            دسته بندی رستوران
        </a>
        <a href="{{route('foodCategories.index')}}" class="border-2 bg-[#7A9A95] rounded-3xl w-40 h-20 m-0 flex justify-center items-center">
            دسته بندی غذا
        </a>
        <a href="{{route('banners.index')}}" class="border-2 bg-[#7A9A95] rounded-3xl w-40 h-20 m-0 flex justify-center items-center">
            مدیریت بنر
        </a>
        <a href="{{route('discounts.index')}}" class="border-2 bg-[#7A9A95] rounded-3xl w-40 h-20 m-0 flex justify-center items-center">
            تعریف کد تخفیف
        </a>
        <a href="{{route('comments.index')}}" class="border-2 bg-[#7A9A95] rounded-3xl w-40 h-20 m-0 flex justify-center items-center">
            بررسی درخواست ها
        </a>
        @endrole

        @role('seller')
            <a href="{{route('restaurants.index')}}" class="border-2 bg-[#7A9A95] rounded-3xl w-40 h-20 m-0 flex justify-center items-center">
                مدیریت رستوران
            </a>
        <a href="{{route("foodParties.index")}}" class="border-2 bg-[#7A9A95] rounded-3xl w-40 h-20 m-0 flex justify-center items-center">
            فود پارتی
        </a>
        <a href="{{route("foods.index")}}" class="border-2 bg-[#7A9A95] rounded-3xl w-40 h-20 m-0 flex justify-center items-center">
            مدیریت غذاها
        </a>
        <a href="{{route("comments.index")}}" class="border-2 bg-[#7A9A95] rounded-3xl w-40 h-20 m-0 flex justify-center items-center">
            لیست کامنت ها
        </a>

        @endrole
    </div>
@endsection
