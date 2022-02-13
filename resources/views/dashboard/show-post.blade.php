@extends('layouts.master')

@section('title')
    {{-- {{ $post->title }} --}}
@endsection



@section('content')

@if($post)

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
    @if($post->image)
        <img src="{{ asset('images/posts/'.$post->image) }}" class="mt-10 md:h-96 shadow-xl">
    @endif
    <p class="mt-10">{{ $post->body }}</p>
    
    <p class="mt-10">
        @foreach (auth()->user()->roles as $role)
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
        
            {{-- <h1 class="text-2xl text-gray-800 mb-7">Comments ({{ count($post->comments) }})</h1>
          
            @foreach ($post->comments as $comment)
                <div class="p-3 mb-7 border-2">
                    <span class="text-sm italic text-blue-700">{{ $comment->user->name }} commented::</span>
                    <p class="mb-5">{{ $comment->body }}</p>       
                    <span class="text-sm italic">{{ $comment->created_at->diffForHumans() }}</span>
                </div>  
                <hr>  
            @endforeach --}}


            <h1 class="text-2xl text-gray-800 mb-7">Comments ({{ count($post->comments) }})</h1>
          
            @foreach ($post->comments as $comment)
                <div class="p-3 mb-7 border-2">
                    <div class="flex">
                        <div>
                            @if($comment->user->image)
                                <img class="h-16" src="{{ asset('images/'.$comment->user->image)}}" />
                            @endif
                        </div>
                        <div class="ml-5">
                            <span class="text-sm text-blue-800">{{ $comment->user->name }} commented </span>
                            <span class="text-sm italic">{{ $comment->created_at->diffForHumans() }}</span>
                            <p class="mb-10">{{ $comment->body }}</p>   

                            
                            {{-- Comment reply section --}}
                            
                            @if (count($comment->replies) > 0)
                                @foreach ($comment->replies as $reply)
                                    <div class="flex mt-5">
                                        <div>
                                            @if($reply->user->image)
                                                <img class="h-16" src="{{ asset('images/'.$reply->user->image)}}" />
                                            @endif
                                        </div>
                                        <div class="ml-5">
                                            <span class="text-sm text-blue-800">{{ $reply->user->name }} replied </span>
                                            <span class="text-sm italic">{{ $reply->created_at->diffForHumans() }}</span>
                                            <p class="mb-5">{{ $reply->body }}</p> 
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            @if(Auth::check())
                                <form method="post" action="{{ route('reply.store', $comment->id) }}" class="mb-10">
                                    @csrf
                                    <input class="w-full mb-5" type="text" name="reply" placeholder="reply to this comment....">
                                    <button type="submit" name="submit" class="py-2 px-3 bg-blue-700 text-white">Reply</button>
                                </form>
                            @endif
                        </div>
                    </div>
                    
                </div>  
                <hr>  
            @endforeach
        
    </div>

@endif
@endsection


