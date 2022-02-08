@extends('layouts.master')

@section('title', 'Post Approval')

@section('content')

    @forelse ($posts as $post)

        <h1 class="font-bold text-xl">{{ $post->title }}</h1>
        <span class="italic text-gray-800 text-sm">
            Created at {{ $post->created_at }} by {{ $post->user->name }}
        </span>
        <p>Category: {{ $post->category->name }}</p>
        @if($post->image)
            <img src="{{ asset('images/posts/'.$post->image) }}" class="mt-10 md:h-96 shadow-xl">
        @endif
        <p class="mt-10">{{ $post->body }}</p>
    
        <p class="mt-10 mb-16">
        @foreach (auth()->user()->roles as $role)
            @if ($role->name == 'Administrator' || Auth::User()->id == $post->user_id)
                <a href="{{ route('edit.post', $post->id) }}" class="py-2 px-3 bg-blue-600 text-white rounded">Edit Post</a>
                <a href="{{ route('delete.post', $post->id) }}" class="py-2 px-3 bg-red-600 text-white rounded">Delete Post</a>
                <a href="{{ route('post.approve', $post->id) }}" class="py-2 px-3 bg-green-600 text-white rounded">Approve for publish</a>   
            @endif
        @endforeach   
        </p>
        <hr class="mb-10">

        
    @empty
        <h1 class="text-gray-800 text-2xl mb-5">No posts are waiting to approved!</h1>
    @endforelse

@endsection