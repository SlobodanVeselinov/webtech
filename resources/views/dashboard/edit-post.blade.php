@extends('layouts.master')

@section('title', 'Edit Post')

@section('content')

    <form method="post" action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="flex w-full mb-5">
            <label for="category" class="w-1/6">Post Category: </label>
            <select id="category" type="text" name="category" class="w-3/6">
                @foreach ($categories as $category)
                    @if($category->order_number > 0)
                        <option name="category" 
                                value="{{ $category->id }}"
                                @if($post->category_id == $category->id)
                                    selected
                                @endif
                                >{{ $category->name }}</option>
                        @endif
                @endforeach
            </select>
            @error('category')
                <div class="text-red-700">* {{ $message }}</div>
            @enderror
        </div>
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
            <label for="image" class="w-1/6">Post image: </label>
            <input id="image" type="file" name="image" placeholder="" class="w-3/6">
            @error('name')
                <div class="text-red-700">* {{ $message }}</div>
            @enderror
        </div>
        <div class="flex w-full mb-5">
            <div class="w-1/6"></div>
            <div  class="w-5/6"><button type="submit" class="py-2 px-4 bg-blue-700 text-white rounded">Update Post</button></div>
        </div>
    </form>



@endsection