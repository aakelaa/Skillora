@extends('layouts.guest')

@section('title', 'Login')

@section('content')
    <div class="space-y-8">
        <div class="text-center">
            <h2 class="text-2xl font-semibold text-heading">Welcome back!!</h2>
            <p class="mt-4 text-sm text-paragraph">Log in to manage your projects, applications, and account settings.</p>
        </div>

        <div class="rounded-[32px] border border-slate-200 bg-white p-8 shadow-card">
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
    @csrf

    <div>
        <x-input-label for="email" value="Email Address" />
        <x-text-input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="mt-2" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="password" value="Password" />
        <x-text-input id="password" type="password" name="password" required class="mt-2" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between text-sm text-paragraph">
        <label class="inline-flex items-center gap-2">
            <input type="checkbox" name="remember" class="rounded border-slate-300 text-primary focus:ring-primary/20" />
            Remember me
        </label>

        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="font-semibold text-primary hover:text-primary/80">Forgot Password?</a>
        @endif
    </div>

    <button type="submit" class="w-full py-3 rounded-full bg-primary text-white font-semibold text-center flex items-center justify-center hover:opacity-90 transition">
        Login
    </button>
</form>

            <p class="mt-6 text-center text-sm text-paragraph">
                Don't have an account?
                <a href="{{ route('register') }}" class="font-semibold text-primary hover:text-primary/80">Register here</a>
            </p>
        </div>
    </div>
@endsection
