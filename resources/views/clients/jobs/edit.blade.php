@extends('layouts.dashboard')

@section('title', 'Edit Job')

@section('content')

    <div class="mb-6">
        <a href="{{ route('clients.jobs.index') }}" class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary hover:text-primary-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" /></svg>
            Back to My Jobs
        </a>
    </div>

    <div class="mx-auto max-w-3xl card-padded">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-heading">Edit Job</h1>
            <p class="mt-2 text-sm text-paragraph">Adjust your job post before the next round of applicant matches.</p>
        </div>

        <form method="POST" action="{{ route('clients.jobs.update', $job) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="field-group">
                <x-input-label for="title" value="Job Title" />
                <x-text-input id="title" name="title" value="{{ old('title', $job->title) }}" required class="mt-1" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div class="field-group">
                <x-input-label for="description" value="Description" />
                <textarea id="description" name="description" rows="6" class="mt-1" required>{{ old('description', $job->description) }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="field-group">
                <x-input-label for="category_id" value="Category" />
                <select id="category_id" name="category_id" class="mt-1">
                    <option value="">-- none --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id', $job->category_id) == $category->id)>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid gap-5 md:grid-cols-2">
                <div class="field-group">
                    <x-input-label for="budget" value="Budget (PKR)" />
                    <x-text-input id="budget" type="number" step="0.01" name="budget" value="{{ old('budget', $job->budget) }}" class="mt-1" />
                    <x-input-error :messages="$errors->get('budget')" class="mt-2" />
                </div>
                <div class="field-group">
                    <x-input-label for="deadline" value="Deadline" />
                    <x-text-input id="deadline" type="date" name="deadline" value="{{ old('deadline', optional($job->deadline)->format('Y-m-d')) }}" class="mt-1" />
                    <x-input-error :messages="$errors->get('deadline')" class="mt-2" />
                </div>
            </div>

            <div class="field-group">
                <x-input-label for="attachment" value="Attachment (optional, replaces current)" />
                <input id="attachment" type="file" name="attachment" class="mt-1" />
                <x-input-error :messages="$errors->get('attachment')" class="mt-2" />
            </div>

            <button type="submit" class="btn-primary w-full">Update Job</button>
        </form>

        <div class="mt-6 rounded-xl border border-danger-100 bg-danger-50 p-5">
            <p class="text-sm font-semibold text-danger-700">Danger zone</p>
            <p class="mt-1 text-xs text-danger-600">Deleting this job will remove all related applications.</p>
            <form method="POST" action="{{ route('clients.jobs.destroy', $job) }}" class="mt-3" onsubmit="return confirm('Delete this job?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-danger w-full">Delete Job</button>
            </form>
        </div>
    </div>
@endsection
