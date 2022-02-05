@extends('layouts.master')

@section('title', 'Edit Profile')


@section('content')

    <form method="post" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="flex w-full mb-5">
            <label for="name" class="w-1/6">Name: </label>
            <input id="name" type="text" name="name" placeholder="" value="{{ $user->name }}" class="w-3/6">
            @error('name')
                <div class="text-red-700">* {{ $message }}</div>
            @enderror
        </div>

        <div class="flex w-full mb-5">
            <label for="email" class="w-1/6">E-mail: </label>
            <input id="email" type="email" name="email" placeholder="" value="{{ $user->email }}" class="w-3/6">
            @error('email')
                <div class="text-red-700">* {{ $message }}</div>
            @enderror
        </div>

        {{-- <div class="flex w-full mb-5">
            <label for="role" class="w-1/6">Role: </label>
            <select id="role" type="text" name="role" placeholder="" class="w-3/6">
                @foreach ($roles as $role)
                    <option name="role" value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            @error('name')
                <div class="text-red-700">* {{ $message }}</div>
            @enderror
        </div> --}}

        <div class="flex w-full mb-5">
            <label for="image" class="w-1/6">Profile image: </label>
            <input id="name" type="file" name="image" placeholder="" class="w-3/6">
            @error('name')
                <div class="text-red-700">* {{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="py-2 px-4 bg-blue-700 text-white rounded">Update user</button>


    </form>



@endsection