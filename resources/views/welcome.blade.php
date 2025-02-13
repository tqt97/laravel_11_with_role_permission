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
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('dashboard') }}">
                                <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                            </a>
                        </div>
                        <!-- Navigation Links -->
                        <div class="space-x-8 -my-px ms-10 flex">
                            {{--                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"> --}}
                            {{--                            {{ __('Dashboard') }} --}}
                            {{--                        </x-nav-link> --}}
                        </div>
                    </div>
                    <!-- Settings Dropdown -->
                    <div class="space-x-8 -my-px ms-10 flex">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                    Dashboard
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-responsive-nav-link>
                                </form>
                            @else
                                <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                                    {{ __('Log in') }}
                                </x-nav-link>
                                @if (Route::has('register'))
                                    <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                                        {{ __('Register') }}
                                    </x-nav-link>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>
        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset
        <!-- Page Content -->
        <main>
            <div class="py-5">
                <div class="max-w-7xl mx-auto px-8">
                    <div class="grid grid-cols-2 bg-white1 overflow-hidden shadow-sm rounded-lg text-gray-900 gap-6">
                        @foreach ($articles as $article)
                            <div class="w-full p-4 bg-white border shadow rounded">
                                <h3 class="font-bold text-xl text-blue-500">
                                    <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
                                </h3>
                                <h5 class="text-sm mb-3">by {{ $article->author->name ?? 'anonymous' }}</h5>
                                <div class="text-sm border-t py-2">
                                    {!! $article->content !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="my-4 w-full bg-gray-100">
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
