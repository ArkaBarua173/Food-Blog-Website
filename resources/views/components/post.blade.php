@props(['post'=> $post])

<div class="mb-4 bg-gray-300 rounded overflow-hidden shadow-md flex h-32">
    <div class=" w-40 pr-2 h-full">
        <img src="/storage/images/{{ $post->image }}" class=" w-full h-full" alt="post_image">
    </div>
    <div>
        <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a>
        <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
        <p class=" mb-8 font-medium">{{ $post->title }}</p>
        <a href="{{ route('singlepost', $post) }}" class="text-blue-700">Read post</a>
    </div>


    <div class="pl-4">
        @auth
            @if (!$post->likedBy(auth()->user()))
                <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                    @csrf
                    <button type="submit" class="text-blue-500">Like</button>
                </form>
            @else
                <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">Unlike</button>
                </form>
            @endif
        @endauth
        <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
    </div>

    @can('delete', $post)
        <form action="{{ route('posts.destroy', $post) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600">Delete</button>
        </form>
    @endcan
</div>
