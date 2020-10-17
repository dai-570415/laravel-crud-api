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
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
    <link href="{{ asset('css/post.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="container">
            <header>
                <div class="title">
                    <img src="/img/laravel.svg" class="logo" />
                    <a href="/">{{ config('app.name', 'Laravel') }}</a>
                </div>
                @auth
                    <div class="logout-icon">                  
                        <img src="/img/logout_wh.png" class="logout" />
                        <a class="logout" 
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            ログアウト
                        </a>    
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endauth
            </header>

            <main>
                @yield('content')
            </main>

            @auth
                <nav>
                    <a class="nav-button" href="{{ route('post.index') }}">
                        <img src="/img/post.svg" class="投稿管理" />
                    </a>
                </nav>
            @endauth
        </div>
    </div>
</body>
</html>
