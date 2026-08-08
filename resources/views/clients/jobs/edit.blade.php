@extends('layouts.dashboard')

@section('title', 'Edit Job')

@section('content')

    <div class="mx-auto max-w-3xl rounded-[32px] border border-slate-200 bg-white p-10 shadow-card">
        <div class="mb-8">
            <h1 class="text-3xl font-semibold text-heading">Edit Job</h1>
            <p class="mt-2 text-sm text-paragraph">Adjust your job post before the next round of applicant matches.</p>
        </div>

        <form method="POST" action="{{ route('clients.jobs.update', $job) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <x-input-label for="title" value="Job Title" />
                <x-text-input id="title" name="title" value="{{ old('title', $job->title) }}" required class="mt-3 block w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="description" value="Description" />
                <textarea id="description" name="description" rows="5" class="mt-3 block w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10" required>{{ old('description', $job->description) }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="category_id" value="Category" />
                <select id="category_id" name="category_id" class="mt-3 block w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10">
                    <option value="">-- none --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id', $job->category_id) == $category->id)>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <x-input-label for="budget" value="Budget (PKR)" />
                    <x-text-input id="budget" type="number" step="0.01" name="budget" value="{{ old('budget', $job->budget) }}" class="mt-3 block w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10" />
                    <x-input-error :messages="$errors->get('budget')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="deadline" value="Deadline" />
                    <x-text-input id="deadline" type="date" name="deadline" value="{{ old('deadline', optional($job->deadline)->format('Y-m-d')) }}" class="mt-3 block w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10" />
                    <x-input-error :messages="$errors->get('deadline')" class="mt-2" />
                </div>
            </div>

            <div>
                <x-input-label for="attachment" value="Attachment (optional, replaces current)" />
                <input id="attachment" type="file" name="attachment" class="mt-3 block w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10" />
                <x-input-error :messages="$errors->get('attachment')" class="mt-2" />
            </div>

            <div class="flex justify-end gap-3 flex-col sm:flex-row sm:items-center">
                <button type="submit" class="rounded-3xl bg-indigo-600 px-6 py-3 text-sm font-semibold text-white hover:bg-indigo-700">Update Job</button>
                <form method="POST" action="{{ route('clients.jobs.destroy', $job) }}" class="w-full sm:w-auto" onsubmit="return confirm('Delete this job?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full rounded-3xl border border-red-200 bg-red-50 px-6 py-3 text-sm font-semibold text-red-700 hover:bg-red-100">Delete Job</button>
                </form>
            </div>
        </form>
    </div>
@endsection
