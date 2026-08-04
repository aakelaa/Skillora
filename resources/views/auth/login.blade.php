@extends('layouts.guest')

@section('title', 'Login')

@section('content')
    <h1 class="text-2xl font-bold text-center mb-6">Login to Your Account</h1>

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <div>
            <x-input-label for="email" value="Email Address" />
            <x-text-input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="mt-1" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="password" value="Password" />
            <x-text-input id="password" type="password" name="password" required class="mt-1" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <div class="flex items-center justify-between text-sm">
            <label class="flex items-center gap-2">
                <input type="checkbox" name="remember" class="rounded border-gray-300">
                Remember me
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-indigo-600 hover:underline">
                    Forgot Password?
                </a>
            @endif
        </div>

        <x-primary-button class="w-full justify-center py-3">Login</x-primary-button>

        <p class="text-sm text-center text-gray-500">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">Register here</a>
        </p>
    </form>
@endsection
