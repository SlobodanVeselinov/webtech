@extends('layouts.master')

@section('title', 'Create Post')

@section('admin-menu')
    @foreach ($user_role as $role)
         @if ($role->name == 'Administrator')
            <a class="text-slate-600 hover:bg-slate-600 hover:text-white p-2 rounded transition ease-in-out" href="{{ route('users.get') }}">View registered users</a>
        @endif
    @endforeach    
@endsection



@section('content')

    <h2 class="text-lg text-gray-800 font-bold">Create a new post</h2>
    <p class="text-gray-800 text-sm mb-10">Fill the form below to create a new post</p>


    <form method="post" action="{{ route('post.store') }}">
        @csrf
        <div class="flex w-full mb-5">
            <label for="title" class="w-1/6">Post Title: </label>
            <input id="title" type="text" name="title" placeholder="" value="{{ old('title') }}" class="w-5/6">
            @error('title')
                <div class="text-red-700">* {{ $message }}</div>
            @enderror
        </div>
        <div class="flex w-full mb-5">
            <label for="body" class="w-1/6">Post Body: </label>
            <textarea id="body" name="body" placeholder="" value="{{ old('body') }}" class="w-5/6 h-96"></textarea>
            @error('body')
                <div class="text-red-700">* {{ $message }}</div>
            @enderror
        </div>
        <div class="flex w-full mb-5">
            <div class="w-1/6"></div>
            <div  class="w-5/6"><button type="submit" class="py-2 px-4 bg-blue-700 text-white rounded">Create Post</button></div>
        </div>
    </form>

@endsection



