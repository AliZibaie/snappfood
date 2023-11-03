@extends('layouts.simple')
@section('content')
    @include('components.navbar')
    @if(session('success'))
        <p class="text-green-700 text-xl text-center">{{session('success')}}</p>
    @elseif(session('fail'))
        <p class="text-red-700 text-xl text-center">{{session('fail')}}</p>
    @endif
    <div class="flex justify-end">
        <a href="{{route('discounts.create')}}"  class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-12 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 mt-12  ">
            افزودن
        </a>
    </div>
    <div class=" mb-20 relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
        <p class="text-center text-xl">پنل مدیریت تخفیف ها</p>
        <table class="w-3/4 mt-4 mx-auto text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="text-lg px-6 py-3">
                    کد تخفیف
                </th>
                <th scope="col" class="text-lg px-6 py-3">
                    انقضا
                </th>
                <th scope="col" class="text-lg px-6 py-3">
                    وضعیت
                </th>
                <th scope="col" class="text-lg px-6 py-3">
                    مقدار تخفیف
                </th>
                <th scope="col" class="text-lg pl-72 py-3  flex justify-center text-center">
                    عملیات
                </th>
            </tr>
            </thead>
            <tbody>
            @forelse($discounts as $discount)
                <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="border-black  w-2/3 relative">
                            <p>{{$discount->code}}</p>
                        </div>
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="border-black  w-2/3 relative">
                            <p>{{$discount->expire_time}}</p>
                        </div>
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="border-black  w-2/3 relative">
                            <p>{{$discount->status}}</p>
                        </div>
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="border-black  w-2/3 relative">
                            <p>{{$discount->amount}}</p>
                        </div>
                    </th>
                    <td class="px-6 py-4 flex justify-end">
                        <div class="flex space-x-2">
                            <a href="{{route('discounts.edit', $discount)}}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">تغییر</a>

                            <form action="{{route('discounts.destroy', $discount)}}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 ">حذف</button>
                            </form>

                        </div>
                    </td>
                </tr>
            @empty
                <td colspan="2"><p class="text-center">هنوز بنری ایجاد نکردید.</p></td>
            @endforelse



            </tbody>
        </table>
    </div>
@endsection
