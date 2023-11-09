@extends('layouts.simple')
@section('content')

        <form method="post" action="{{route('schedules.store')}}" class="w-2/3 mx-auto mt-8" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                @error('day')
                <p class="text-xl text-red-700 my-4">{{$message}}</p>
                @enderror
                <select  id="day" class="bg-gray-800 text-white border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="day[]" multiple >
                    <option value="" selected disabled>انتخاب روز</option>
                    @forelse($days as $day)
                        <option value="{{$day}}" >{{$day}}</option>
                    @empty
                    @endforelse
                </select>
            </div>

            <div class="mb-6">
                @error('open')
                <p class="text-xl text-red-700 my-4">{{$message}}</p>
                @enderror
                <label for="open" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> ساعت شروع</label>
                <input type="time" id="open" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="open" value="{{old('open')}}">
            </div>

            <div class="mb-6">
                @error('close')
                <p class="text-xl text-red-700 my-4">{{$message}}</p>
                @enderror
                <label for="close" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> ساعت پایان</label>
                <input type="time" id="close" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="close" value="{{old('close')}}">
            </div>



            <div class="flex justify-between">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ذخیره</button>
                <a href="{{route('schedules.index')}}">برگشت</a>
            </div>
        </form>



@endsection
