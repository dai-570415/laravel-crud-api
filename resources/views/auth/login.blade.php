@extends('layouts.app')

@section('content')
<h2>{{ __('Login') }}</h2>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div>
        <label for="email">{{ __('E-Mail') }}</label>
        <div>
            <input
                id="email" 
                type="email" 
                name="email" 
                value="{{ old('email') }}" 
                required autocomplete="email" 
                autofocus
            >

            @error('email')
                <p role="alert">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div>
        <label for="password">{{ __('Password') }}</label>
        <div>
            <input 
                id="password" 
                type="password" 
                name="password" 
                required 
                autocomplete="current-password"
            >

            @error('password')
                <p role="alert">{{ $message }}</p>
            @enderror
        </div>
    </div>


    <div>
        <input
            type="checkbox" 
            name="remember" 
            id="remember" 
            {{ old('remember') ? 'checked' : '' }}
        >
        <label for="remember">{{ __('Remember Me') }}</label>
    </div>

    <div>
        <button type="submit">{{ __('Login') }}</button>
    </div>
</form>
@endsection
