@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            @auth
                <div class="pb-4">
                    <a href="{{ route('posts') }}" class=" text-blue-500">Click here</a>
                    <span> to create post</span>
                </div>
            @endauth
            @guest
                <div class="pb-4">
                    <a href="{{ route('login') }}" class=" text-blue-500">Login</a>
                    <span> to create post and like post</span>
                </div>
            @endguest
            @if ($posts->count())
                @foreach ($posts as $post)
                    <x-post :post="$post" />
                @endforeach
                {{ $posts->links() }}
            @else
                <p>There are no posts</p>
            @endif
        </div>
    </div>
@endsection
