@extends('layouts.master')

@section('title', 'Users Infomation')

@section('admin-menu')
    @foreach ($user_role as $role)
         @if ($role->name == 'Administrator')
            <a class="text-slate-600 hover:bg-slate-600 hover:text-white p-2 rounded transition ease-in-out" href="{{ route('users.get') }}">View registered users</a>
        @endif
    @endforeach    
@endsection


@section('content')

        <div class="flex">
            <h2 class="text-lg text-gray-800 font-bold mb-10">User profile information</h2>
            
        </div>

        <div class="flex w-full mb-5 border-b-4">
            <div class="w-1/6">Name: </div>
            <div class="w-3/6">{{ $selected_user->name }}</div>
        </div>

        <div class="flex w-full mb-5 border-b-4">
            <div class="w-1/6">E-mail: </div>
            <div class="w-3/6">{{ $selected_user->email }}</div>
        </div>

        <div class="flex w-full mb-5 border-b-4">
            <div class="w-1/6">Date of registration: </div>
            <div class="w-3/6">{{ $selected_user->created_at }}</div>
        </div>

        <div class="flex w-full mb-5 border-b-4">
            <div class="w-1/6">Role: </div>
            <div class="w-3/6">
                @foreach ($selected_user->roles as $role)
                    {{ $role->name }}
                @endforeach
            </div>
        </div>
        <a href="{{ route('edit.user', $selected_user->id) }}" class="ml-auto bg-blue-700 text-white rounded py-2 px-3">Edit User</a>


    <h2 class="text-lg text-gray-800 font-bold mb-10 mt-10">Posts Information</h2>

        <div class="flex w-full mb-5 border-b-4">
            <div class="w-1/6">Created Post: </div>
            <div class="w-3/6">{{ count($selected_user->posts) }}</div>
        </div>

@endsection