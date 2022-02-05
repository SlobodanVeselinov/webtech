@extends('layouts.master')

@section('title', 'Categories')



@section('content')

            @if (Session::has('category-created'))
                <div class="p-5 mb-7 bg-green-500 rounded text-white">
                    <p class="">{{ Session::get('category-created') }}</p>
                </div>
            @endif

<h1 class="text-gray-800 text-2xl mb-5">Categories</h1>


        <table class="border-collapse w-full">
        <tr class="bg-slate-800 text-white h-10 text-left">
            <th class="pl-2">id</th>
            <th class="">Category Name</th>
            <th class="">Posts</th>
            <th class="">Order position</th>
            <th class="">Action</th>
        </tr>
        <tbody>
            @foreach ($categories as $category) 
                <tr class="border-b border-slate-800">
                    <td class="p-3">{{ $category->id }}</td>
                    <td class="p-3">{{ $category->name }}</td>
                    <td class="p-3">{{ count($category->posts) }}</td>
                    <td class="p-3">{{ $category->order_number }}</td>
                    <td class="flex justify-between p-3">

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>



    <h1 class="text-gray-800 text-2xl mt-10 mb-5">Create new category</h1>

    <form action="{{ route('category.create') }}" method="post">
        @csrf
        <div class="flex flex-col mb-5">
        <label for="name" class="">Category name: </label>
        <input id="name" type="text" name="name" placeholder="" value="" class="">
            @error('name')
                <div class="text-red-700">* {{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="py-2 px-4 bg-blue-700 text-white rounded">Create category</button>
        
    </form>




@endsection