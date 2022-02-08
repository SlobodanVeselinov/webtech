@extends('layouts.front')

@section('title', $post->title)

@section('mainContent')

    <div class="border-b-2 text-gray-800 mb-14">
        
        <h1 class="text-4xl mb-2">{{ $post->title }}</h1>

        <span class="italic">
            Posted by: {{ $post->user->name }} - {{ $post->created_at->diffForHumans() }}
        </span>  
        <p class="">
            Category: <a href="{{ route('home.category.view', $post->category->id) }}" class="text-blue-600">{{ $post->category->name }}</a>
        </p> 

        <span class="flex mt-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg> 
            {{ count($post->comments) }} comments
        </span>

        @if ($post->image)
            <img src="{{ asset('images/posts/'.$post->image) }}" class="h-80 ring-offset-2 ring-2 ring-slate-800 mt-10">
        @endif
        
        <p class="mt-8 mb-8">{{ $post->body }}</p>
    </div>

    <div class="mt-10 border-t-4 p-5">

        
            @if(Session::has('comment-created'))
                <div class="p-5 mb-7 bg-green-400 rounded text-white">
                    <p class="alert alert-info">{{ Session::get('comment-created') }}</p>
                </div>
            @endif
            
        
        <h1 class="text-xl text-gray-800 mb-7">Create a comment</h1>
        @if(Auth::check())
        <form method="post" action="{{ route('comment.store', $post->id) }}" class="mb-10">
            @csrf
            <input class="w-full mb-5" type="text" name="comment" placeholder="write your comment....">
            <button type="submit" name="submit" class="py-2 px-3 bg-blue-700 text-white">Post Comment</button>
        </form>
        @else
            <p class="mb-10">
                You have to be registered and logged in to create a comment. Click here to <a href="{{ route('register') }}" class="text-blue-600">Register</a> or <a href="{{ route('login') }}" class="text-blue-600">Login</a>
            </p>
        @endif
        
            <h1 class="text-2xl text-gray-800 mb-7">Comments ({{ count($post->comments) }})</h1>
          
            @foreach ($post->comments as $comment)
                <div class="p-3 mb-7 border-2">
                    <span class="text-sm italic text-blue-700">{{ $comment->user->name }} commented::</span>
                    <p class="mb-5">{{ $comment->body }}</p>       
                    <span class="text-sm italic">{{ $comment->created_at->diffForHumans() }}</span>
                </div>  
                <hr>  
            @endforeach
        
    </div>


@endsection