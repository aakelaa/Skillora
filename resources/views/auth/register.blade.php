@extends('layouts.guest')

@section('title', 'Register')

@section('content')
    <h1 class="text-2xl font-bold text-center mb-6">Create Your Account</h1>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

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
        </div>@extends('layouts.guest')

@section('title', 'Register')

@section('content')
    <h1 class="text-2xl font-bold text-center mb-1">Create Your Freelancer Account</h1>
    <p class="text-sm text-gray-500 text-center mb-6">
        Are you a client looking to hire? <a href="#" class="text-indigo-600 hover:underline">Contact us</a> to get an account set up.
    </p>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <div>
            <x-input-label for="name" value="Full Name" />
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
        </div>

        <x-primary-button class="w-full justify-center py-3">Register as Freelancer</x-primary-button>

        <p class="text-sm text-center text-gray-500">
            Already registered?
            <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Log in</a>
        </p>
    </form>
@endsection


        <div>
            <x-input-label for="password_confirmation" value="Confirm Password" />
            <x-text-input id="password_confirmation" type="password" name="password_confirmation" required class="mt-1" />
        </div>

        <x-primary-button class="w-full justify-center py-3">Register</x-primary-button>

        <p class="text-sm text-center text-gray-500">
            Already registered?
            <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Log in</a>
        </p>
    </form>
@endsection
