
@extends('layouts.simple')
@section('content')
    @if(Auth::user()->restaurant)
        <div class="flex flex-col items-center justify-center min-h-screen bg-gray-900">
            <!-- dark theme -->
            <div class="container  m-4">
                <div class="max-w-3xl w-full mx-auto grid gap-4 grid-cols-1">
                    <h1 class="text-xl text-center text-green-700">تنظیمات رستوران</h1>
                    <!-- profile card -->
                    <div class="flex flex-col sticky top-0 z-10">
                        <div class="bg-gray-800 border border-gray-800 shadow-lg  rounded-2xl p-4">
                            <div class="flex-none sm:flex">
                                <div class=" relative h-32 w-32   sm:mb-0 mb-3">
                                    <img src="{{url(Auth::user()->restaurant->image->url)}}" alt="عکس رستوران" class=" w-32 h-32 object-cover rounded-2xl">

                                </div>
                                <div class="flex-auto sm:ml-5 justify-evenly">
                                    <div class="flex items-center justify-between sm:mt-2">
                                        <div class="flex items-center">
                                            <div class="flex flex-col">
                                                <div class="w-full flex-none text-lg text-gray-200 font-bold leading-none ">نام رستوران: {{Auth::user()->restaurant->name}}</div>

                                            </div>

                                        </div>

                                    </div>
                                    <div class="flex items-center py-8">
                                        <form action="{{route('restaurants.updateStatus')}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="flex-no-shrink bg-yellow-400 hover:bg-yellow-500 px-5 ml-4 py-2 text-xs shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-yellow-300 hover:border-yellow-500 text-white rounded-full transition ease-in duration-300" name="status" value="0">بستن رستوران</button>

                                            <button type="submit" class="flex-no-shrink bg-blue-600 hover:bg-blue-500 px-5 ml-4 py-2 text-xs shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-blue-300 hover:border-blue-500 text-white rounded-full transition ease-in duration-300" name="status" value="1">باز کردن رستوران</button>
                                        </form>
                                    </div>
                                    <div class="flex items-end pb-8  text-sm text-gray-400 flex-col space-y-2">
                                        <a href="{{route('restaurants.edit', Auth::user()->restaurant)}}"  class="flex-no-shrink bg-green-400 hover:bg-green-500 px-5 ml-4 py-2 text-xs shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-green-300 hover:border-green-500 text-white rounded-full transition ease-in duration-300">تغییر</a>
                                        <a href="{{route('addresses.index')}}"  class="flex-no-shrink bg-purple-400 hover:bg-purple-500 px-5 ml-4 py-2 text-xs shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-purple-300 hover:border-purple-500 text-white rounded-full transition ease-in duration-300">افزودن آدرس</a>
                                        <form action="{{route('restaurants.destroy', Auth::user()->restaurant)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"  class="flex-no-shrink bg-red-400 hover:bg-red-500 px-5 ml-4 py-2 text-xs shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-red-300 hover:border-red-500 text-white rounded-full transition ease-in duration-300">حذف رستوران </button>
                                        </form>
                                    </div>
                                    <div class=" text-gray-400 my-1  mx-auto flex flex-col  text-right">
                                        <span class="text-xl ">آدرس : {{Auth::user()->restaurant->address}}</span>
                                        <span class="text-xl " >شماره تماس : {{Auth::user()->restaurant->phone}}</span>
                                        <span class=" text-xl">وضعیت : {{Auth::user()->restaurant->status ? 'باز' : 'بسته'}}</span>
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('dashboard')}}"  class="flex-no-shrink bg-gray-900 hover:bg-gray-500 px-5 py-2 text-xs shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-gray-300 hover:border-gray-500 text-white rounded-full transition ease-in duration-300">برگشت</a>
                        </div>
                    </div>
                    <!---stats-->
                    <div class="grid grid-cols-12 gap-4 ">
                        <div class="col-span-12 sm:col-span-4">
                            <div class="p-4 relative  bg-gray-800 border border-gray-800 shadow-lg  rounded-2xl">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14  absolute bottom-4 right-3 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
                                </svg>
                                <div class="flex justify-between items-center ">
                                    <img class="w-7 filter grayscale" src="https://v1.tailwindcss.com/_next/static/media/tailwindcss-mark.6ea76c3b72656960a6ae5ad8b85928d0.svg" alt="taiwind css">
                                </div>
                                <div class="text-2xl text-gray-100 font-medium leading-8 mt-5">0</div>
                                <div class="text-sm text-gray-500">میزان سود</div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-4">
                            <div class="p-4 relative  bg-gray-800 border border-gray-800 shadow-lg  rounded-2xl">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14  absolute bottom-4 right-3 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                                </svg>
                                <div class="flex justify-between items-center ">
                                    <i class="fab fa-behance text-xl text-gray-400"></i>
                                </div>
                                <div class="text-2xl text-gray-100 font-medium leading-8 mt-5">0</div>
                                <div class="text-sm text-gray-500">سفارشات</div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-4">
                            <div class="p-4 relative  bg-gray-800 border border-gray-800 shadow-lg  rounded-2xl">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14  absolute bottom-4 right-3 text-yellow-300" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <div class="flex justify-between items-center ">
                                    <i class="fab fa-codepen text-xl text-gray-400"></i>
                                </div>
                                <div class="text-2xl text-gray-100 font-medium leading-8 mt-5">0</div>
                                <div class="text-sm text-gray-500">هزینه کل</div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

    @else
               <div class="h-[calc(100vh)] w-full bg-gray-900">
                   <div class="w-96 mx-auto pt-8 space-y-12">

                       <h1 class="text-xl text-center mx-auto text-green-600">شما هنوز رستورانی ندارید</h1>
                       <div class="flex justify-between">
                           <a href="{{route('dashboard')}}" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">برگشت</a>
                           <a href="{{route('restaurants.create')}}" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"> افتتاح رستوران</a>

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
