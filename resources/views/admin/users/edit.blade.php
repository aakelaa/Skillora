@extends('layouts.dashboard')

@section('title', 'Edit Client')

@section('content')

    <div class="mx-auto max-w-2xl rounded-[32px] border border-slate-200 bg-white p-10 shadow-card">
        <div class="mb-8">
            <h1 class="text-3xl font-semibold text-heading">Edit Client</h1>
            <p class="mt-2 text-sm text-paragraph">Update account details and access for this user.</p>
        </div>

        <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <x-input-label for="name" value="Client Name" />
                <x-text-input id="name" name="name" value="{{ old('name', $user->name) }}" required class="mt-3 block w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="email" value="Email" />
                <x-text-input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required class="mt-3 block w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex flex-col gap-3 sm:flex-row sm:justify-between sm:items-center">
                <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="w-full sm:w-auto" onsubmit="return confirm('Delete this client?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full rounded-3xl border border-red-200 bg-red-50 px-5 py-3 text-sm font-semibold text-red-700 hover:bg-red-100">Delete This Client</button>
                </form>
                <x-primary-button class="w-full sm:w-auto rounded-3xl px-6 py-3">Save Changes</x-primary-button>
            </div>
        </form>
    </div>

@endsection
