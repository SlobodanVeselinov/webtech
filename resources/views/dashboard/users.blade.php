@extends('layouts.master')

@section('title', 'Users')

@section('admin-menu')
    @foreach ($user_role as $role)
         @if ($role->name == 'Administrator')
            <a class="text-slate-600 hover:bg-slate-600 hover:text-white p-2 rounded transition ease-in-out" href="{{ route('users.get') }}">View registered users</a>
        @endif
    @endforeach    
@endsection


@section('content')

    <h2 class="text-xl font-bold text-gray-800 mb-10 p-3">Registered Users</h2>

    <table class="border-collapse w-full">
        <tr class="bg-slate-800 text-white h-10">
            <th class="">Name</th>
            <th class="">e-mail adress</th>
            <th class="">Role</th>
            <th class="">Registered on</th>
            <th class="">Action</th>
        </tr>
        <tbody>
            @foreach ($users as $user) 
                <tr class="border-b border-slate-800">
                    <td class="p-3">{{ $user->name }}</td>
                    <td class="p-3">{{ $user->email }}</td>
                    <td class="p-3">
                        @foreach ($user->roles as $role)
                            {{ $role->name }}
                        @endforeach
                    </td>
                    <td class="p-3">{{ $user->created_at }}</td>
                    <td class="flex justify-between p-3">
                            <a href="{{ url('/user/'.$user->id) }}">
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>

                            <a href="{{ route('delete.user', $user->id) }}">
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection







