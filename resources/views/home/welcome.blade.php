@extends('layouts.front')

@section('title', 'WebTech')

@section('mainContent')

 
    @forelse ($posts as $post) 

        <div class="border-b-2 text-gray-800 mb-14 pb-10 text-lg">
            <div class="md:grid md:content-center md:gap-5 md:grid-cols-12">
                <div class="col-span-4">
                    @if ($post->image)
                        <img src="{{ asset('images/posts/'.$post->image) }}" class="h-60 ring-offset-2 ring-2 ring-slate-800">
                    @else
                    <img src="https://picsum.photos/400/300">
                    @endif
                    
                </div>

                <div class="col-span-8">
                    <h1 class="text-4xl mb-2">{{ $post->title }}</h1>

                    <span class="italic flex text-sm">
                        Posted by: {{ $post->user->name }}  {{ $post->created_at->diffForHumans() }}, 
                        
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>

                        {{ count($post->comments) }} comments
                    </span>
                    Category: <a href="{{ route('home.category.view', $post->category->id) }}" class="italic text-blue-700">{{ $post->category->name }}</a>
                    
                    <p class="mt-8 mb-8">{{ \Illuminate\Support\Str::limit($post->body, 200, '...') }}</p>

                    <a href="{{ route('home.post.view', $post->id) }}" class="px-3 py-2 bg-blue-500 text-white rounded-md">Read More</a>
                </div>
            </div>

        </div>
        @empty
            <h1 class="text-gray-800 text-2xl mb-5">No posts yet. Be first one to create a post. 
                @if (!Auth::check())
                    First login or register!    
                @endif

                @if (Auth::check())
                    Click <a href="/create-post" class="text-blue-600">HERE</a> to create post!    
                @endif

            </h1>
        @endforelse
    {{ $posts->links() }}

@endsection