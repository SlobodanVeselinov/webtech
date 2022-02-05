@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<h1 class="text-gray-800 text-2xl mb-5">My Posts</h1>
@if (\Session::has('success'))
    <div class="p-5 bg-green-400 text-white w-full mb-5">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif

    @if (count($posts) > 0)
        @foreach ($posts as $post)

            <div class="mb-12">
                <h1 class="font-bold text-2xl">{{ $post->title }}</h1>
                <p class="text-sm">Category: {{ $post->category->name }}</p>
                <p class="mt-5">{{ \Illuminate\Support\Str::limit($post->body, 200, '...') }} 
                    <a href="{{ url('post/'.$post->id) }}" class="italic font-bold text-sm">Read More ></a>
                </p>
                <span class="text-sm italic">Created: {{ $post->created_at->diffForHumans() }}</span>
            </div>
            {{-- <p class="mt-3 mb-10">
                <a href="{{ route('edit.post', $post->id) }}" class="py-2 px-3 bg-blue-600 text-white rounded">Edit Post</a>
                <a href="{{ route('delete.post', $post->id) }}" class="py-2 px-3 bg-red-600 text-white rounded">Delete Post</a>   
            </p> --}}
            
        @endforeach

        {{ $posts->links() }}

    @else 
            <p>No posts from {{ Auth::User()->name }}</p>
    @endif
@endsection



