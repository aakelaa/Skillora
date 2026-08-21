@extends('layouts.dashboard')

@section('title', 'Add Client')

@section('content')

    <div class="mb-6">
        <a href="{{ route('admin.users.index') }}" class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary hover:text-primary-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" /></svg>
            Back to Accounts
        </a>
    </div>

    <div class="mx-auto max-w-2xl card-padded">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-heading">Add Client</h1>
            <p class="mt-2 text-sm text-paragraph">Create a new client or freelancer account with approval status control.</p>
        </div>

        <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-6">
            @csrf

            <div class="field-group">
                <x-input-label for="name" value="Client Name" />
                <x-text-input id="name" name="name" value="{{ old('name') }}" required class="mt-1" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="field-group">
                <x-input-label for="email" value="Email" />
                <x-text-input id="email" type="email" name="email" value="{{ old('email') }}" required class="mt-1" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex gap-3 pt-2">
                <a href="{{ route('admin.users.index') }}" class="btn-secondary flex-1">Cancel</a>
                <button type="submit" class="btn-primary flex-1">Create Account</button>
            </div>
        </form>
    </div>
@endsection
