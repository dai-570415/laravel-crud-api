@extends('layouts.app')

@section('content')
<div class="login-page">
    <h3>ログインしてください</h3>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            @error('email')
                <p class="error" role="alert">{{ $message }}</p>
            @enderror
            <div>
                <input
                    id="email" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}"
                    placeholder="メールアドレス  例.example@domain.jp"
                    required autocomplete="email" 
                    autofocus
                >
            </div>
        </div>

        <div>
            @error('email')
                <p class="error" role="alert">{{ $message }}</p>
            @enderror
            <div>
                <input 
                    id="password" 
                    type="password" 
                    name="password" 
                    placeholder="パスワード  注.8文字以上"
                    required 
                    autocomplete="current-password"
                >
            </div>
        </div>

        <div>
            <button type="submit">ログイン</button>
        </div>

        @guest
            <a class="nav-link" href="{{ route('register') }}">まだ登録がお済みでない方&nbsp;&nbsp;|&nbsp;&nbsp;登録</a>
        @endguest
    </form>
</div>
@endsection
