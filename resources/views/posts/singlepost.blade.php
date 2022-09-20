@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <div class="mb-4 p-4 bg-gray-300 rounded overflow-hidden shadow-md">
                @if ($post)
                    <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a>
                    <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
                    <div class=" w-60 pr-2 h-full rounded pt-4">
                        <img src="/storage/images/{{ $post->image }}" class=" w-full" alt="post_image">
                    </div>
                    <p class="pt-4 font-medium">{{ $post->title }}</p>
                    <p class="pt-4 pb-4">{{ $post->body }}</p>
                    <div class="flex mb-6">
                        @auth
                            @if (!$post->likedBy(auth()->user()))
                                <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-2">
                                    @csrf
                                    <button type="submit" class="text-blue-500">Like</button>
                                </form>
                            @else
                                <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-blue-500 pr-1">Unlike</button>
                                </form>
                            @endif
                        @endauth

                        @can('delete', $post)
                            <form action="{{ route('posts.destroy', $post) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">Delete</button>
                            </form>
                        @endcan
                        <span class="pl-2">{{ $post->likes->count() }}
                            {{ Str::plural('like', $post->likes->count()) }}</span>
                    </div>
                @else
                    <p>There are no posts</p>
                @endif
                <a href="{{ route('dashboard') }}" class=" text-blue-700 ">Return to Dashboard</a>
            </div>
        </div>
    </div>
@endsection
