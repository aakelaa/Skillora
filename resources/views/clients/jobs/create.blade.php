@extends('layouts.dashboard')

@section('title', 'Post a Job')

@section('content')

    <div class="mx-auto max-w-3xl rounded-[32px] border border-slate-200 bg-white p-10 shadow-card">
        <div class="mb-8">
            <h1 class="text-2xl font-semibold text-heading">Post a Job</h1>
            <p class="mt-2 text-sm text-paragraph">Share your project details and attract top talent quickly.</p>
        </div>

        <form method="POST" action="{{ route('clients.jobs.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <x-input-label for="title" value="Job Title" />
                <x-text-input id="title" name="title" value="{{ old('title') }}" required class="mt-3 block w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="description" value="Description" />
                <textarea id="description" name="description" rows="5" class="mt-3 block w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10" required>{{ old('description') }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="category_id" value="Category" />
                <select id="category_id" name="category_id" class="mt-3 block w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10">
                    <option value="">-- none --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <x-input-label for="budget" value="Budget (PKR)" />
                    <x-text-input id="budget" type="number" step="0.01" name="budget" value="{{ old('budget') }}" class="mt-3 block w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10" />
                    <x-input-error :messages="$errors->get('budget')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="deadline" value="Deadline" />
                    <x-text-input id="deadline" type="date" name="deadline" value="{{ old('deadline') }}" class="mt-3 block w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10" />
                    <x-input-error :messages="$errors->get('deadline')" class="mt-2" />
                </div>
            </div>

            <div>
                <x-input-label for="attachment" value="Attachment (optional)" />
                <input id="attachment" type="file" name="attachment" class="mt-3 block w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10" />
                <x-input-error :messages="$errors->get('attachment')" class="mt-2" />
            </div>

            <div class="flex justify-end">
                <button type="submit" class="w-full py-3 rounded-full bg-primary text-white font-semibold text-center flex items-center justify-center hover:opacity-90 transition">
        Post Job
    </button>
            </div>
        </form>
    </div>
@endsection
