@extends('layouts.dashboard')

@section('title', 'Edit Client')

@section('content')

    <form method="POST" action="{{ route('admin.users.update', $user) }}"
          class="bg-white p-6 rounded-xl border max-w-lg space-y-4">
        @csrf
        @method('PUT')

        <div>
            <x-input-label for="name" value="Client Name" />
            <x-text-input id="name" name="name" value="{{ old('name', $user->name) }}" required class="mt-1" />
            <x-input-error :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" value="Email" />
            <x-text-input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required class="mt-1" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <x-primary-button>Save Changes</x-primary-button>
    </form>

    <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="max-w-lg mt-3"
          onsubmit="return confirm('Delete this client?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-600 text-sm hover:underline">Delete This Client</button>
    </form>

@endsection
