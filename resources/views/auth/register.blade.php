@extends('layouts.app')

@section('content')
<div class="login-page">
    <h2>{{ __('Register') }}</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <label for="name">{{ __('Name') }}</label>
            @error('name')
                <p class="error" role="alert">{{ $message }}</p>
            @enderror
            <div>
                <input
                    id="name" 
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autocomplete="name" 
                    autofocus
                >
            </div>
        </div>

        <div>
            <label for="email">{{ __('E-Mail Address') }}</label>
            @error('email')
                <p class="error" role="alert">{{ $message }}</p>
            @enderror
            <div>
                <input
                    id="email" 
                    type="email"
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    autocomplete="email"
                >
            </div>
        </div>

        <div>
            <label for="password">{{ __('Password') }}</label>
            @error('password')
                <p class="error" role="alert">{{ $message }}</p>
            @enderror
            <div>
                <input
                    id="password" 
                    type="password"
                    name="password" 
                    required 
                    autocomplete="new-password"
                >
            </div>
        </div>

        <div>
            <label for="password-confirm">{{ __('Confirm Password') }}</label>
            <div>
                <input
                    id="password-confirm" 
                    type="password"
                    name="password_confirmation"
                    required 
                    autocomplete="new-password"
                >
            </div>
        </div>

        <div>
            <button type="submit">{{ __('Register') }}</button>
        </div>
    </form>
</div>
@endsection
