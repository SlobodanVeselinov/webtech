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
            <nav class="ml-auto">
                @if (!Auth::check())
                    <a href="{{ route('login') }}" class="text-white hover:text-yellow-500 mr-5">Login</a>
                    <a href="{{ route('register') }}" class="text-white hover:text-yellow-500">Register</a>
                @else
                    <span class="text-slate-400 text-sm mr-10">
                        {{ Auth::User()->name }}
                    </span>
                    <a href="{{ route('dashboard') }}" class="text-white hover:text-yellow-500">Dashboard</a>
                    <a class="text-white px-3 hover:text-yellow-400" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span class="border border-yellow-500 hover:bg-yellow-400 text-white p-2 rounded-md">Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endif
            </nav>
        </div>
    </div>
    {{-- HEADER END --}}
    

    {{-- NAVIGATION --}}
    <div class="w-full bg-slate-900">
        <div class="container bg-slate-900 md:mx-auto md:py-3 md:space-x-10 md:flex md:flex-row flex flex-col">
            <a href="{{ route('home.index') }}" class=" text-white font-extralight pl-6 md:pl-3 hover:text-yellow-500">HOME</a>
            @foreach ($categories as $category)
                <a href="" class=" text-white font-extralight pl-6 md:pl-3 hover:text-yellow-500">{{ $category->name }}</a>
            @endforeach
        </div>
    </div>
    {{-- NAVIGATION END --}}


    <div class="container mx-auto lg:grid lg:grid-cols-12 lg:mt-20">

        <div class="md:grid md:col-span-8 p-3 text-justify text-lg">
            @yield('mainContent')
        </div>

        <div class="md:grid md:col-span-1">
        </div>

        <div class="md:grid md:col-span-3 p-3  content-start">
            <h1 class="text-gray-800 text-2xl mb-5">Latest Posts</h1>
            @foreach ($latest_posts as $post)
                <p class="text-blue-700 mb-3"><a href="{{ route('home.post.view', $post->id) }}">{{ $post->title }}</a></p>
            @endforeach
            <h1 class="text-gray-800 text-2xl mb-5 mt-14">Categories</h1>
            <div class="md:grid md:grid-cols-2 gap-5">
                @foreach ($categories as $category)
                    <div class="">
                        <a href="#" class="text-blue-800">
                            {{ $category->name }}
                           ( {{ count(DB::select('select * from posts where category_id ='.$category->id)) }} )
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

</body>
</html>
