@extends('layouts.dashboard')

@section('title', 'Add Client')

@section('content')

    <div class="mx-auto max-w-2xl rounded-[32px] border border-slate-200 bg-white p-10 shadow-card">
        <div class="mb-8">
            <h1 class="text-3xl font-semibold text-heading">Add Client</h1>
            <p class="mt-2 text-sm text-paragraph">Create a new client or freelancer account with approval status control.</p>
        </div>

        <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-6">
            @csrf

            <div>
                <x-input-label for="name" value="Client Name" />
                <x-text-input id="name" name="name" value="{{ old('name') }}" required class="mt-3 block w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="email" value="Email" />
                <x-text-input id="email" type="email" name="email" value="{{ old('email') }}" required class="mt-3 block w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex justify-end">
                <button type="submit" class="w-full py-3 rounded-full bg-primary text-white font-semibold text-center flex items-center justify-center hover:opacity-90 transition">
        CREATE CLIENT ACCOUNT
    </button>
            </div>
        </form>
    </div>

@endsection
