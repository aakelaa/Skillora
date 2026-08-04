@extends('layouts.dashboard')

@section('title', 'Account Settings')

@section('content')
    <div class="space-y-6 max-w-xl">

        <div class="bg-white p-6 rounded shadow-sm border">
            <h2 class="font-semibold mb-1">Profile Information</h2>
            <p class="text-xs text-gray-500 mb-4">Update your name and email address.</p>

            <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
                @csrf
                @method('PATCH')

                <div>
                    <x-input-label for="name" value="Name" />
                    <x-text-input id="name" name="name" value="{{ old('name', $user->name) }}" required class="mt-1" />
                    <x-input-error :messages="$errors->get('name')" />
                </div>

                <div>
                    <x-input-label for="email" value="Email" />
                    <x-text-input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required class="mt-1" />
                    <x-input-error :messages="$errors->get('email')" />
                </div>

                <x-primary-button>Save</x-primary-button>
            </form>
        </div>

        <div class="bg-white p-6 rounded shadow-sm border">
            <h2 class="font-semibold mb-1">Update Password</h2>
            <p class="text-xs text-gray-500 mb-4">Use a long, random password to stay secure.</p>

            <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <x-input-label for="current_password" value="Current Password" />
                    <x-text-input id="current_password" type="password" name="current_password" class="mt-1" />
                    <x-input-error :messages="$errors->get('current_password')" />
                </div>

                <div>
                    <x-input-label for="password" value="New Password" />
                    <x-text-input id="password" type="password" name="password" class="mt-1" />
                    <x-input-error :messages="$errors->get('password')" />
                </div>

                <div>
                    <x-input-label for="password_confirmation" value="Confirm New Password" />
                    <x-text-input id="password_confirmation" type="password" name="password_confirmation" class="mt-1" />
                </div>

                <x-primary-button>Update Password</x-primary-button>
            </form>
        </div>

        <div class="bg-white p-6 rounded shadow-sm border border-red-200">
            <h2 class="font-semibold mb-1 text-red-700">Delete Account</h2>
            <p class="text-xs text-gray-500 mb-4">Once deleted, all data will be permanently removed.</p>

            <form method="POST" action="{{ route('profile.destroy') }}"
                  onsubmit="return confirm('Are you sure? This cannot be undone.');" class="space-y-4">
                @csrf
                @method('DELETE')

                <div>
                    <x-input-label for="password_delete" value="Password" />
                    <x-text-input id="password_delete" type="password" name="password" class="mt-1" />
                    <x-input-error :messages="$errors->get('password')" />
                </div>

                <button type="submit" class="text-sm text-red-700 border border-red-300 px-4 py-2 rounded hover:bg-red-50">
                    Delete Account
                </button>
            </form>
        </div>

    </div>
@endsection
