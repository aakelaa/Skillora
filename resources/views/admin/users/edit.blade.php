@extends('layouts.dashboard')

@section('title', 'Edit Client')

@section('content')

    <div class="mb-6">
        <a href="{{ route('admin.users.index') }}" class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary hover:text-primary-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" /></svg>
            Back to Accounts
        </a>
    </div>

    <div class="mx-auto max-w-2xl card-padded">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-heading">Edit Client</h1>
            <p class="mt-2 text-sm text-paragraph">Update account details and access for this user.</p>
        </div>

        <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="field-group">
                <x-input-label for="name" value="Client Name" />
                <x-text-input id="name" name="name" value="{{ old('name', $user->name) }}" required class="mt-1" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="field-group">
                <x-input-label for="email" value="Email" />
                <x-text-input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required class="mt-1" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <button type="submit" class="btn-primary w-full">Save Changes</button>
        </form>

        <div class="mt-6 rounded-xl border border-danger-100 bg-danger-50 p-5">
            <p class="text-sm font-semibold text-danger-700">Danger zone</p>
            <p class="mt-1 text-xs text-danger-600">This will permanently remove the account.</p>
            <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="mt-3" onsubmit="return confirm('Delete this client?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-danger w-full">Delete This Client</button>
            </form>
        </div>
    </div>
@endsection
