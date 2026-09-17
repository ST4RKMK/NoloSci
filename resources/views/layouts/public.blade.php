<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="{{asset('build/assets/app-BM9BSUJO.css')}}" type="text/css" rel="stylesheet" />
        <link href="{{asset('giorgio.css')}}" type="text/css" rel="stylesheet" />
        <script src="{{asset('build/assets/app-qVfKvd79.js')}}" defer></script>
{{--        @fluxAppearance--}}
    </head>
    <body class="">
    <header class="w-full">
    <div class="flex justify-between p-2 navbar bg-base-100 shadow-sm" >
        <div class="navbar-start">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                    <svg aria-label="Menu" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" /> </svg>
                </div>
                <ul
                    tabindex="-1"
                    class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                    <li><a href="{{route('public.products')}}">Products</a></li>
                </ul>
            </div>
        </div>
        <div class="navbar-center">
            <a class="btn btn-ghost text-xl" title="Go to home" href="/">{{env('APP_NAME', 'Home')}}</a>
        </div>
        <div class="navbar-end">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="btn btn-primary"
                        >
                            Dashboard
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="btn btn-info"
                        >
                            Log in
                        </a>
                    @endauth
                </nav>
            @endif
        </div>

    </div>
    </header>
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="grid lg:grid-cols-4 gap-4 mb-4 md:grid-cols-2 sm:grid-cols-2">
                <livewire:carrellino-disabili></livewire:carrellino-disabili>
            @yield('content')
            </div>
        </div>
{{--    @fluxScripts--}}
    </body>
</html>
