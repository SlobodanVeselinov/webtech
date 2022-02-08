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
            <div class="flex text-white font-bold text-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5" />
                </svg>
                <span class="ml-3">WebTech</span>
            </div>
            
            {{-- LOGOUT BTN--}}
            <nav class="ml-auto">
                <a href="{{ url('/home') }}" class="text-white hover:text-yellow-500 mr-5">Home</a>
                <a class="text-white px-3 hover:text-yellow-400" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span class="border border-yellow-500 hover:bg-yellow-400 text-white p-2 rounded-md">Logout</span>
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
            
            {{-- ADMINISTRATOR MENU LINKS --}}
            @foreach(auth()->user()->roles as $role)
                @if ($role->name == 'Administrator')
                    <a class="text-slate-600 hover:bg-slate-600 hover:text-white p-2 rounded transition ease-in-out" href="#">Admin Dashboard</a>
                @endif
            @endforeach
            {{-- ----------------------------------------- --}}

            <a class="text-slate-600 hover:bg-slate-600 hover:text-white p-2 rounded transition ease-in-out" href="{{ route('dashboard') }}">My Posts</a>
            {{-- <a class="text-slate-600 hover:bg-slate-600 hover:text-white p-2 rounded transition ease-in-out" href="{{ route('posts.all') }}">View all posts</a> --}}
            <a class="text-slate-600 hover:bg-slate-600 hover:text-white p-2 rounded transition ease-in-out" href="{{ route('post.create') }}">Create new post</a>
            <a class="text-slate-600 hover:bg-slate-600 hover:text-white p-2 rounded transition ease-in-out" href="{{ route('profile.settings', Auth::User()->id) }}">Profile Settings</a>

            {{-- ADMINISTRATOR MENU LINKS --}}
                @if ($role->name == 'Administrator')
                    <a class="text-slate-600 hover:bg-slate-600 hover:text-white p-2 rounded transition ease-in-out" href="{{ route('users.get') }}">View registered users</a>
                    <a class="text-slate-600 hover:bg-slate-600 hover:text-white p-2 rounded transition ease-in-out" href="{{ route('category.index') }}">View categories</a>
                    <hr>
                    <a class="text-slate-600 hover:bg-slate-600 hover:text-white p-2 rounded transition ease-in-out" href="{{ route('post.approval') }}">Posts waiting approval
                        ( {{ count(DB::select('select * from posts where is_approved = 0')) }} )
                    </a>
                @endif
            {{-- ----------------------------------------- --}}    
        </div>

        {{-- MAIN CONTENT AREA --}}
        <div class="sm:col-span-7 p-7">
                @yield('content')
        </div>

        {{-- RIGHT SIDE CONTENT AREA --}}
        <div class="sm:col-span-3 p-7 border shadow-md">

                <h1 class="text-gray-800 text-2xl mb-5">Latest Posts</h1>

                @foreach ($posts as $post)
                    
                        <li class="mb-5">
                            <a href="{{ url('post/'.$post->id) }}" class="">{{ $post->title }}</a>
                            <p class="italic text-sm">posted by {{ $post->user->name}}, {{ $post->created_at->diffForHumans()}}</p>
                        </li>
                    
                @endforeach

        </div>
    </div>
    
</body>
</html>
