@extends('layouts.dashboard')

@section('title', 'Add Client')

@section('content')

    <form method="POST" action="{{ route('admin.users.store') }}"
          class="bg-white p-6 rounded-xl border max-w-lg space-y-4">
        @csrf

        <div>
            <x-input-label for="name" value="Client Name" />
            <x-text-input id="name" name="name" value="{{ old('name') }}" required class="mt-1" />
            <x-input-error :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" value="Email" />
            <x-text-input id="email" type="email" name="email" value="{{ old('email') }}" required class="mt-1" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <x-primary-button>Create Client Account</x-primary-button>
    </form>

@endsection
