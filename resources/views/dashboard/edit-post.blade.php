@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('admin-menu')
    @foreach ($user_role as $role)
         @if ($role->name == 'Administrator')
            <a class="text-slate-600 hover:bg-slate-600 hover:text-white p-2 rounded transition ease-in-out" href="{{ route('users.get') }}">View registered users</a>
        @endif
    @endforeach    
@endsection


@section('content')

    <form method="post" action="{{ route('post.update', $post->id) }}">
        @csrf
        <div class="flex w-full mb-5">
            <label for="title" class="w-1/6">Post Title: </label>
            <input id="title" type="text" name="title" placeholder="" value="{{ $post->title }}" class="w-5/6">
            @error('title')
                <div class="text-red-700">* {{ $message }}</div>
            @enderror
        </div>
        <div class="flex w-full mb-5">
            <label for="body" class="w-1/6">Post Body: </label>
            <textarea id="body" name="body" placeholder="" value="" class="w-5/6 h-96">{{ $post->body }}</textarea>
            @error('body')
                <div class="text-red-500">* {{ $message }}</div>
            @enderror
        </div>
        <div class="flex w-full mb-5">
            <div class="w-1/6"></div>
            <div  class="w-5/6"><button type="submit" class="py-2 px-4 bg-blue-700 text-white rounded">Update Post</button></div>
        </div>
    </form>



@endsection