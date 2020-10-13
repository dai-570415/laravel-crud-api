@extends('layouts.app')

@section('content')
<div class="login-page">
    <h2>{{ __('Login') }}</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email">{{ __('E-Mail') }}</label>
            @error('email')
                <p class="error" role="alert">{{ $message }}</p>
            @enderror
            <div>
                <input
                    id="email" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required autocomplete="email" 
                    autofocus
                >
            </div>
        </div>

        <div>
            <label for="password">{{ __('Password') }}</label>
            @error('email')
                <p class="error" role="alert">{{ $message }}</p>
            @enderror
            <div>
                <input 
                    id="password" 
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="current-password"
                >
            </div>
        </div>

        <div>
            <button type="submit">{{ __('Login') }}</button>
            <input
                type="checkbox" 
                name="remember" 
                id="remember" 
                {{ old('remember') ? 'checked' : '' }}
            >
            <label for="remember">{{ __('Remember Me') }}</label>
        </div>
    </form>
</div>
@endsection
