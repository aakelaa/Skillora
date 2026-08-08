@extends('layouts.dashboard')

@section('title', 'Account Settings')

@section('content')
    <div class="space-y-8 max-w-3xl">

        <div class="rounded-[32px] border border-slate-200 bg-white p-8 shadow-card">
            <div class="mb-6">
                <h2 class="text-2xl font-semibold text-heading">Profile Information</h2>
                <p class="mt-2 text-sm text-paragraph">Update your name and email address.</p>
            </div>

            <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
                @csrf
                @method('PATCH')

                <div>
                    <x-input-label for="name" value="Name" />
                    <x-text-input id="name" name="name" value="{{ old('name', $user->name) }}" required class="mt-3 block w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="email" value="Email" />
                    <x-text-input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required class="mt-3 block w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="w-full py-3 rounded-full bg-primary text-white font-semibold text-center flex items-center justify-center hover:opacity-90 transition">
        Save
    </button>
                </div>
            </form>
        </div>

        <div class="rounded-[32px] border border-slate-200 bg-white p-8 shadow-card">
            <div class="mb-6">
                <h2 class="text-2xl font-semibold text-heading">Update Password</h2>
                <p class="mt-2 text-sm text-paragraph">Use a long, random password to stay secure.</p>
            </div>

            <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <x-input-label for="current_password" value="Current Password" />
                    <x-text-input id="current_password" type="password" name="current_password" class="mt-3 block w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10" />
                    <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="password" value="New Password" />
                    <x-text-input id="password" type="password" name="password" class="mt-3 block w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="password_confirmation" value="Confirm New Password" />
                    <x-text-input id="password_confirmation" type="password" name="password_confirmation" class="mt-3 block w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10" />
                </div>

                <div class="flex justify-end">
                   <button type="submit" class="w-full py-3 rounded-full bg-primary text-white font-semibold text-center flex items-center justify-center hover:opacity-90 transition">
        Update Password
    </button>
                </div>
            </form>
        </div>

        <div class="rounded-[32px] border border-red-200 bg-white p-8 shadow-card">
            <div class="mb-6">
                <h2 class="text-2xl font-semibold text-red-700">Delete Account</h2>
                <p class="mt-2 text-sm text-paragraph">Once deleted, all data will be permanently removed.</p>
            </div>

            <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Are you sure? This cannot be undone.');" class="space-y-6">
                @csrf
                @method('DELETE')

                <div>
                    <x-input-label for="password_delete" value="Password" />
                    <x-text-input id="password_delete" type="password" name="password" class="mt-3 block w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="w-full py-3 rounded-full bg-primary text-white font-semibold text-center flex items-center justify-center hover:opacity-90 transition">
        Delete Account
    </button>
                </div>
            </form>
        </div>

    </div>
@endsection
