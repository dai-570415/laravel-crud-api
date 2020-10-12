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
</head>
<body>
    <div id="app">
        <div class="container">
            <header>
                <a href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <div>
                    @guest
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        {{ Auth::user()->name }}
                        <div>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <a class="nav-link" href="{{ route('user.index') }}">{{ __('User') }}</a>
                            <a class="nav-link" href="{{ route('post.index') }}">{{ __('Post') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    @endguest
                </div>
            </header>

            <main>
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
