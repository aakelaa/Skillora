@extends('layouts.dashboard')

@section('title', 'Account Settings')

@section('content')
    <div class="page-header !border-none !mb-6">
        <div>
            <h1 class="page-title">Account Settings</h1>
            <p class="page-subtitle">Manage your profile information, password, and account security.</p>
        </div>
    </div>

    <div class="space-y-6 max-w-3xl">

        <div class="card-padded">
            <div class="mb-6">
                <h2 class="text-lg font-bold text-heading">Profile Information</h2>
                <p class="mt-1 text-sm text-paragraph">Update your name and email address.</p>
            </div>

            <form method="POST" action="{{ route('profile.update') }}" class="space-y-5">
                @csrf
                @method('PATCH')

                <div class="field-group">
                    <x-input-label for="name" value="Name" />
                    <x-text-input id="name" name="name" value="{{ old('name', $user->name) }}" required class="mt-1" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="field-group">
                    <x-input-label for="email" value="Email" />
                    <x-text-input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required class="mt-1" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="btn-primary">Save Changes</button>
                </div>
            </form>
        </div>

        <div class="card-padded">
            <div class="mb-6">
                <h2 class="text-lg font-bold text-heading">Update Password</h2>
                <p class="mt-1 text-sm text-paragraph">Use a long, random password to stay secure.</p>
            </div>

            <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
                @csrf
                @method('PUT')

                <div class="field-group">
                    <x-input-label for="current_password" value="Current Password" />
                    <x-text-input id="current_password" type="password" name="current_password" class="mt-1" />
                    <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
                </div>

                <div class="grid gap-5 sm:grid-cols-2">
                    <div class="field-group">
                        <x-input-label for="password" value="New Password" />
                        <x-text-input id="password" type="password" name="password" class="mt-1" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="field-group">
                        <x-input-label for="password_confirmation" value="Confirm New Password" />
                        <x-text-input id="password_confirmation" type="password" name="password_confirmation" class="mt-1" />
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="btn-primary">Update Password</button>
                </div>
            </form>
        </div>

        <div class="card-padded !border-danger-100 bg-danger-50/40">
            <div class="mb-6">
                <h2 class="text-lg font-bold text-danger-700">Delete Account</h2>
                <p class="mt-1 text-sm text-paragraph">Once deleted, all data will be permanently removed. This cannot be undone.</p>
            </div>

            <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Are you sure? This cannot be undone.');" class="space-y-5">
                @csrf
                @method('DELETE')

                <div class="field-group max-w-sm">
                    <x-input-label for="password_delete" value="Password" />
                    <x-text-input id="password_delete" type="password" name="password" class="mt-1" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <button type="submit" class="btn-danger">Delete Account</button>
            </form>
        </div>

    </div>
@endsection
