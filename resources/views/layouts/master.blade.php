<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <title>@yield('title')</title>
</head>
<body>

    {{-- HEADER --}}
    <div class="w-full bg-slate-900 p-5">
        <div class="container sm:mx-auto flex">
            <h2 class="text-white font-bold text-xl">Blog Project</h2>
            
            {{-- LOGOUT BTN--}}
            <nav class="ml-auto">
                <a href="{{ url('/') }}" class="text-sm text-gray-300 ml-8">Home</a>
                <a class="text-white px-3 hover:text-yellow-400" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span class="bg-yellow-500 hover:bg-yellow-400 text-white p-2 rounded">Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </nav>
            {{-- LOGOUT END --}}
        </div>
    </div>
    {{-- HEADER END --}}

    {{-- MAIN AREA --}}
    <div class="container sm:mx-auto sm:grid sm:grid-cols-12 mt-5">
        
        {{-- SIDE BAR --}}
        
        <div class="flex flex-col sm:text-right p-5 sm:border-r-2 border-slate-600 col-span-2">
            <div class=" w-36 h-36 bg-slate-600 rounded-full ml-auto">
                <img src="{{ asset('images/' . Auth::User()->image) }}" alt="" class="w-36 h-36 rounded-full ml-auto">
            </div>
            <h2 class="text-lg font-bold text-slate-700 mt-7 mb-14">{{ Auth::User()->name }}</h2>
            <a class="text-slate-600 hover:bg-slate-600 hover:text-white p-2 rounded transition ease-in-out" href="{{ route('dashboard') }}">My Posts</a>
            <a class="text-slate-600 hover:bg-slate-600 hover:text-white p-2 rounded transition ease-in-out" href="{{ route('posts.all') }}">View all posts</a>
            <a class="text-slate-600 hover:bg-slate-600 hover:text-white p-2 rounded transition ease-in-out" href="{{ route('post.create') }}">Create new post</a>
            <a class="text-slate-600 hover:bg-slate-600 hover:text-white p-2 rounded transition ease-in-out" href="{{ route('profile.settings', Auth::User()->id) }}">Profile Settings</a>
            @yield('admin-menu')
        </div>

        {{-- MAIN CONTENT AREA --}}
        <div class="sm:col-span-7 p-7">

                @yield('content')

        </div>

        <div class="sm:col-span-3 p-7 border shadow-md">

                <h2 class="text-lg text-white p-3 mb-10 bg-slate-600">Latest Posts</h2>

                @foreach ($posts as $post)
                    
                        <li class="mb-5">
                            <a href="{{ url('post/'.$post->id) }}">{{ $post->title }}</a>
                        </li>
                    
                @endforeach

        </div>
    </div>
    
</body>
</html>
