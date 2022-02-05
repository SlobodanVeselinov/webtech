@extends('layouts.master')

@section('title')
    {{ $post->title }}
@endsection

@section('admin-menu')
    @foreach ($user_role as $role)
         @if ($role->name == 'Administrator')
            <a class="text-slate-600 hover:bg-slate-600 hover:text-white p-2 rounded transition ease-in-out" href="{{ route('users.get') }}">View registered users</a>
        @endif
    @endforeach    
@endsection

@section('content')

            @if (Session::has('post-updated'))
                <div class="p-5 mb-7 bg-green-400 rounded text-white">
                    <p class="alert alert-info">{{ Session::get('post-updated') }}</p>
                </div>
            @endif
    <h1 class="font-bold text-xl">{{ $post->title }}</h1>
    <span class="italic text-gray-800 text-sm">
        Created at {{ $post->created_at }} by {{ $post->user->name }}
    </span>
    <p>Category: {{ $post->category->name }}</p>
    <img src="{{ asset('images/posts/'.$post->image) }}" class="mt-10 md:h-96 shadow-xl">
    <p class="mt-10">{{ $post->body }}</p>
    
    <p class="mt-10">
        @foreach ($user_role as $role)
         @if ($role->name == 'Administrator' || Auth::User()->id == $post->user_id)
            <a href="{{ route('edit.post', $post->id) }}" class="py-2 px-3 bg-blue-600 text-white rounded">Edit Post</a>
            <a href="{{ route('delete.post', $post->id) }}" class="py-2 px-3 bg-red-600 text-white rounded">Delete Post</a>   
        @endif
        @endforeach   
    </p>

    <div class="mt-10 border-t-4 p-5">

        
            @if(Session::has('comment-created'))
                <div class="p-5 mb-7 bg-green-400 rounded text-white">
                    <p class="alert alert-info">{{ Session::get('comment-created') }}</p>
                </div>
            @endif
            
        
        <h1 class="text-xl text-gray-800 mb-7">Create a comment</h1>
        <form method="post" action="{{ route('comment.store', $post->id) }}" class="mb-10">
            @csrf
            <input class="w-full mb-5" type="text" name="comment" placeholder="write your comment....">
            <button type="submit" name="submit" class="py-2 px-3 bg-blue-700 text-white">Post Comment</button>
        </form>
        
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


