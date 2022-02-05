@extends('layouts.master')

@section('title', 'All Posts')


@section('content')
    <h2 class="text-xl font-bold text-gray-800 mb-10 p-3">All Posts</h2>
    
    @if (count($posts)>0)
        @foreach ($posts as $post)
            <h2 class="font-semibold text-gray-800 text-xl mt-10">{{ $post->title }}</h2>
            <p class="text-s text-gray-800 italic mb-8">Author: {{ $post->user->name }}, created: {{ $post->created_at->diffForHumans() }}</p>
            <p class="text-gray-800 mt-5 mb-5">
                {{ \Illuminate\Support\Str::limit($post->body, 200, '...') }}
                <a href="{{ url('post/'.$post->id) }}" class="italic font-bold text-sm">Read More ></a>
            </p>
            <hr>
        @endforeach
    @else
        <p class="text-gray-800 text-lg">No posts available!</p>
    @endif
    
    {{ $posts->links() }}
    
@endsection



@section('right-content')
    Right content section
@endsection
