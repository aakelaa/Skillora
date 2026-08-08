@extends('layouts.guest')

@section('title', 'Register')

@section('content')
    <h1 class="text-3xl font-semibold text-heading text-center mb-3">Create your Skillora account</h1>
    <p class="text-sm text-paragraph text-center mb-6">
        Choose your account type and submit an approval request. New accounts are reviewed before access is granted.
    </p>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <div>
            <x-input-label for="role" value="Account Type" />
            <div class="mt-3 grid gap-3 sm:grid-cols-2">
                <label class="group rounded-[28px] border border-slate-200 bg-surface p-5 shadow-card cursor-pointer transition hover:border-primary/50">
                    <div class="flex items-start gap-3">
                        <input type="radio" name="role" value="freelancer" {{ old('role', 'freelancer') === 'freelancer' ? 'checked' : '' }} class="mt-1 h-4 w-4 text-primary border-slate-300" />
                        <div>
                            <p class="font-semibold text-heading">Freelancer</p>
                            <p class="mt-1 text-sm text-paragraph">Browse jobs, submit proposals, and build your profile.</p>
                        </div>
                    </div>
                </label>

                <label class="group rounded-[28px] border border-slate-200 bg-surface p-5 shadow-card cursor-pointer transition hover:border-primary/50">
                    <div class="flex items-start gap-3">
                        <input type="radio" name="role" value="client" {{ old('role') === 'client' ? 'checked' : '' }} class="mt-1 h-4 w-4 text-primary border-slate-300" />
                        <div>
                            <p class="font-semibold text-heading">Client</p>
                            <p class="mt-1 text-sm text-paragraph">Post jobs, manage candidates, and hire top freelancers.</p>
                        </div>
                    </div>
                </label>
            </div>
            <x-input-error :messages="$errors->get('role')" class="mt-1" />
        </div>

        <div>
            <x-input-label for="name" value="Full Name / Company Name" />
            <x-text-input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus class="mt-1" />
            <x-input-error :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" value="Email Address" />
            <x-text-input id="email" type="email" name="email" value="{{ old('email') }}" required class="mt-1" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="password" value="Password" />
            <x-text-input id="password" type="password" name="password" required class="mt-1" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <div>
            <x-input-label for="password_confirmation" value="Confirm Password" />
            <x-text-input id="password_confirmation" type="password" name="password_confirmation" required class="mt-1" />
            <x-input-error :messages="$errors->get('password_confirmation')" />
        </div>

        <button type="submit" class="w-full py-3 rounded-full bg-primary text-white font-semibold text-center flex items-center justify-center hover:opacity-90 transition">
        Submit
    </button>

        <p class="text-sm text-center text-paragraph">
            Already registered? <a href="{{ route('login') }}" class="font-semibold text-primary hover:text-primary/80">Log in</a>
        </p>
    </form>
@endsection
