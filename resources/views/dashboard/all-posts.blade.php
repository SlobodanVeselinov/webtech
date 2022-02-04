@extends('layouts.master')

@section('title', 'All Posts')

@section('admin-menu')
    @foreach ($user_role as $role)
         @if ($role->name == 'Administrator')
            <a class="text-slate-600 hover:bg-slate-600 hover:text-white p-2 rounded transition ease-in-out" href="{{ route('users.get') }}">View registered users</a>
        @endif
    @endforeach    
@endsection


@section('content')
    <h2 class="text-xl font-bold text-white mb-10 bg-slate-600 p-3">All Posts</h2>
    @foreach ($posts as $post)
        <h2 class="font-semibold text-gray-800 text-xl mt-10">{{ $post->title }}</h2>
        <p class="text-s text-gray-800 italic mb-8">Author: {{ $post->user->name }}, created: {{ $post->created_at->diffForHumans() }}</p>
        <p class="text-gray-800 mt-5 mb-5">
            {{ \Illuminate\Support\Str::limit($post->body, 200, '...') }}
            <a href="{{ url('post/'.$post->id) }}" class="italic font-bold text-sm">Read More ></a>
        </p>
         
             
        <hr>
    @endforeach

    {{ $posts->links() }}
    
@endsection



@section('right-content')
    Right content section
@endsection
