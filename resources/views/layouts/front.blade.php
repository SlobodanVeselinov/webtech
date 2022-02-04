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
            <nav class="ml-auto">
                @if (!Auth::check())
                    <a href="{{ route('login') }}" class="text-white hover:text-yellow-500 mr-5">Login</a>
                    <a href="#" class="text-white hover:text-yellow-500">Register</a>
                @else
                    <a href="{{ route('dashboard') }}" class="text-white hover:text-yellow-500">Dashboard</a>
                @endif
            </nav>
        </div>
    </div>
    {{-- HEADER END --}}
    

    {{-- NAVIGATION --}}
    <div class="container bg-slate-900 md:mx-auto md:mt-3 md:p-3 md:space-x-10 md:flex md:flex-row flex flex-col">
        <a href="" class=" text-white font-extralight pl-6 md:pl-3 hover:text-yellow-500">HOME</a>
        <a href="" class=" text-white font-extralight pl-6 md:pl-3 hover:text-yellow-500">TEHNOLOGY 2</a>
        <a href="" class=" text-white font-extralight pl-6 md:pl-3 hover:text-yellow-500">COMPUTER SCIENCE</a>
        <a href="" class=" text-white font-extralight pl-6 md:pl-3 hover:text-yellow-500">GAMES</a>
        <a href="" class=" text-white font-extralight pl-6 md:pl-3 hover:text-yellow-500">FUN</a>
    </div>
    {{-- NAVIGATION END --}}


    <div class="container mx-auto md:grid md:grid-cols-12 md:mt-10 ">
        <div class="md:grid md:col-span-9 p-3 border-2">
            @yield('mainContent')
        </div>
        <div class="md:grid md:col-span-3 p-3">
            RIGHT SIDE AREA
        </div>
    </div>



</body>
</html>
