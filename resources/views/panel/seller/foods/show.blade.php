
@extends('layouts.simple')
@section('content')
    <div class="bg-gray-800 h-[calc(100vh-0rem)] flex justify-center items-center relative">
        <div class="w-full max-w-lg bg-gray-900 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-end px-4 pt-4">
                <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                    <span class="sr-only">Open dropdown</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                        <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdown" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2" aria-labelledby="dropdownButton">
                        <li>
                            <a href="{{route('foods.edit', $food)}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">تغییر</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">دریافت </a>
                        </li>
                        <li>
                            <form action="{{route('foods.destroy', $food)}}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">حذف</button>
                                </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col items-center pb-10">
                <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{url($food->image->url ?? '')}}" alt="Bonnie image"/>
                <h5 class="mb-1 text-xl font-medium text-white dark:text-white">{{$food->name}}</h5>
                <span class="text-sm text-gray-500 dark:text-gray-400">{{$food->price}}</span>
                <span class="text-sm text-gray-500 dark:text-gray-400">{{$food->raw_materials}}</span>
                <span class="text-sm text-gray-500 dark:text-gray-400">{{$food->foodCategory->food_type}}</span>
                <div class="flex mt-4 space-x-3 md:mt-6">
                    <form action="{{route('foodParties.create')}}" method="post">
                        <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Message</a>
                    </form>

                    <form action="{{route('assign.discount', $food)}}" method="post">
                        @csrf
                        <select class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700" name="discount">
                            <option value="" selected disabled>لطفا کد تخفیف رو انتخاب کنید</option>
                            @forelse($discounts as $discount)
                                <option value="{{$discount->id}}" class="text-black text-xl">{{$discount->amount}}</option>
                            @empty
                                <p class="text-xl text-danger text-center">هنوز کد تخفیفی تعریف نشده</p>
                            @endforelse
                        </select>
                        <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">اعمال کد تخفیف</button>
                    </form>
                </div>
            </div>
        </div>
        <a href="{{route('foods.index')}}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 absolute bottom-16 left-1/3">بازگشت</a>
    </div>

@endsection
