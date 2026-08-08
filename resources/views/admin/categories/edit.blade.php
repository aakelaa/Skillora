@extends('layouts.dashboard')

@section('title', 'Edit Category')

@section('content')

    <div class="mx-auto max-w-lg rounded-[32px] border border-slate-200 bg-white p-10 shadow-card">
        <div class="mb-8">
            <h1 class="text-3xl font-semibold text-heading">Edit Category</h1>
            <p class="mt-2 text-sm text-paragraph">Update the category label and manage its display in the marketplace.</p>
        </div>

        <form method="POST" action="{{ route('admin.categories.update', $category) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <x-input-label for="name" value="Category Name" />
                <x-text-input id="name" name="name" value="{{ old('name', $category->name) }}" required class="mt-3 block w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="flex flex-col gap-3 sm:flex-row sm:justify-between sm:items-center pt-4">
                <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" class="w-full sm:w-auto" onsubmit="return confirm('Delete this category?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full rounded-3xl border border-red-200 bg-red-50 px-5 py-3 text-sm font-semibold text-red-700 hover:bg-red-100">Delete Category</button>
                </form>
                <x-primary-button class="w-full sm:w-auto rounded-3xl px-6 py-3">Update Category</x-primary-button>
            </div>
        </form>
    </div>
@endsection
