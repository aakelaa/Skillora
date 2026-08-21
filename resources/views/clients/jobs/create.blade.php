@extends('layouts.dashboard')

@section('title', 'Post a Job')

@section('content')

    <div class="mb-6">
        <a href="{{ route('clients.jobs.index') }}" class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary hover:text-primary-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" /></svg>
            Back to My Jobs
        </a>
    </div>

    <div class="mx-auto max-w-3xl card-padded">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-heading">Post a Job</h1>
            <p class="mt-2 text-sm text-paragraph">Share your project details and attract top talent quickly.</p>
        </div>

        <form method="POST" action="{{ route('clients.jobs.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="field-group">
                <x-input-label for="title" value="Job Title" />
                <x-text-input id="title" name="title" value="{{ old('title') }}" required class="mt-1" placeholder="e.g. Build a landing page in React" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div class="field-group">
                <x-input-label for="description" value="Description" />
                <textarea id="description" name="description" rows="6" class="mt-1" placeholder="Describe the scope, deliverables, and requirements..." required>{{ old('description') }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="field-group">
                <x-input-label for="category_id" value="Category" />
                <select id="category_id" name="category_id" class="mt-1">
                    <option value="">-- none --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid gap-5 md:grid-cols-2">
                <div class="field-group">
                    <x-input-label for="budget" value="Budget (PKR)" />
                    <x-text-input id="budget" type="number" step="0.01" name="budget" value="{{ old('budget') }}" class="mt-1" />
                    <x-input-error :messages="$errors->get('budget')" class="mt-2" />
                </div>
                <div class="field-group">
                    <x-input-label for="deadline" value="Deadline" />
                    <x-text-input id="deadline" type="date" name="deadline" value="{{ old('deadline') }}" class="mt-1" />
                    <x-input-error :messages="$errors->get('deadline')" class="mt-2" />
                </div>
            </div>

            <div class="field-group">
                <x-input-label for="attachment" value="Attachment (optional)" />
                <input id="attachment" type="file" name="attachment" class="mt-1" />
                <x-input-error :messages="$errors->get('attachment')" class="mt-2" />
            </div>

            <div class="flex gap-3 pt-2">
                <a href="{{ route('clients.jobs.index') }}" class="btn-secondary flex-1">Cancel</a>
                <button type="submit" class="btn-primary flex-1">Post Job</button>
            </div>
        </form>
    </div>
@endsection
