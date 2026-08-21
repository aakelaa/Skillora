@extends('layouts.guest')

@section('title', 'Login')

@section('content')
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-heading">Welcome back!</h2>
        <p class="mt-2 text-sm text-paragraph">Log in to manage your projects, applications, and account settings.</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div class="field-group">
            <x-input-label for="email" value="Email Address" />
            <x-text-input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="mt-1" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="field-group">
            <x-input-label for="password" value="Password" />
            <x-text-input id="password" type="password" name="password" required class="mt-1" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between text-sm">
            <label class="inline-flex items-center gap-2 font-medium text-paragraph">
                <input type="checkbox" name="remember" class="rounded border-border text-primary focus:ring-primary-100" />
                Remember me
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="font-semibold text-primary hover:text-primary-700">Forgot password?</a>
            @endif
        </div>

        <button type="submit" class="btn-primary w-full">Login</button>
    </form>

    <p class="mt-8 text-center text-sm text-paragraph">
        Don't have an account?
        <a href="{{ route('register') }}" class="font-semibold text-primary hover:text-primary-700">Register here</a>
    </p>
@endsection
