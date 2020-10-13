<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="container">
            <header>
                <div class="title">
                    <img src="/img/laravel.svg" class="logo" />
                    <a href="/">{{ config('app.name', 'Laravel') }}</a>
                </div>
                
                <nav>
                    @guest
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        {{ Auth::user()->name }}
                        <a class="nav-link" href="{{ route('user.index') }}">{{ __('User') }}</a>
                        <a class="nav-link" href="{{ route('post.index') }}">{{ __('Post') }}</a>

                        <a class="nav-link" 
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                </nav>
            </header>

            <main>
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
