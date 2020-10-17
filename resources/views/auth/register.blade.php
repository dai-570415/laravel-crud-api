@extends('layouts.app')

@section('content')
<div class="login-page">
    <h3>登録してください</h3>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            @error('name')
                <p class="error" role="alert">{{ $message }}</p>
            @enderror
            <div>
                <input
                    id="name" 
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="お名前"
                    required
                    autocomplete="name" 
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
                    id="email" 
                    type="email"
                    name="email" 
                    value="{{ old('email') }}" 
                    placeholder="メールアドレス  例.example@domain.jp"
                    required 
                    autocomplete="email"
                >
            </div>
        </div>

        <div>
            @error('password')
                <p class="error" role="alert">{{ $message }}</p>
            @enderror
            <div>
                <input
                    id="password" 
                    type="password"
                    name="password" 
                    placeholder="パスワード  注.8文字以上"
                    required 
                    autocomplete="new-password"
                >
            </div>
        </div>

        <div>
            <div>
                <input
                    id="password-confirm" 
                    type="password"
                    name="password_confirmation"
                    placeholder="同じパスワードを再入力"
                    required 
                    autocomplete="new-password"
                >
            </div>
        </div>

        <div>
            <button type="submit">登録する</button>
        </div>

        @guest
            <a class="nav-link" href="{{ route('login') }}">すでに登録済みの方&nbsp;&nbsp;|&nbsp;&nbsp;ログイン</a>
        @endguest
    </form>
</div>
@endsection
