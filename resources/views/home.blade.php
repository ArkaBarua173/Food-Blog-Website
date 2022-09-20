@extends('layouts.app')

@section('content')
    <div class="flex justify-center" style="height: 80vh">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <div class=" flex-col m-auto pt-10 h-full text-center">
                <img src="img/food.png" alt="" srcset="" class="m-auto w-1/4 object-cover">
                <h1 class="mt-4 text-6xl text-center mb-4">Welcome to Food Blog</h1>
                <a href="{{ route('dashboard') }}" class="text-4xl text-blue-500 font-bold">Explore</a>
            </div>
        </div>
    </div>
@endsection
