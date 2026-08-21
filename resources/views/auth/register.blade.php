@extends('layouts.guest')

@section('title', 'Register')

@section('content')
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-heading">Create your Skillora account</h2>
        <p class="mt-2 text-sm text-paragraph">Choose your account type and submit an approval request. New accounts are reviewed before access is granted.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div class="field-group">
            <x-input-label for="role" value="Account Type" />
            <select id="role" name="role" required class="mt-1">
                <option value="" disabled selected>Select account type</option>
                <option value="freelancer" @selected(old('role') === 'freelancer')>Freelancer — Browse jobs &amp; apply</option>
                <option value="client" @selected(old('role') === 'client')>Client — Post jobs &amp; hire</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <div class="field-group">
            <x-input-label for="name" value="Full Name / Company Name" />
            <x-text-input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus class="mt-1" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="field-group">
            <x-input-label for="email" value="Email Address" />
            <x-text-input id="email" type="email" name="email" value="{{ old('email') }}" required class="mt-1" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="grid gap-5 sm:grid-cols-2">
            <div class="field-group">
                <x-input-label for="password" value="Password" />
                <x-text-input id="password" type="password" name="password" required class="mt-1" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="field-group">
                <x-input-label for="password_confirmation" value="Confirm Password" />
                <x-text-input id="password_confirmation" type="password" name="password_confirmation" required class="mt-1" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

        <button type="submit" class="btn-primary w-full">Submit</button>
    </form>

    <p class="mt-8 text-center text-sm text-paragraph">
        Already registered? <a href="{{ route('login') }}" class="font-semibold text-primary hover:text-primary-700">Log in</a>
    </p>
@endsection
