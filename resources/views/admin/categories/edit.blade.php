@extends('layouts.dashboard')

@section('title', 'Edit Category')

@section('content')

    <div class="mb-6">
        <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary hover:text-primary-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" /></svg>
            Back to Categories
        </a>
    </div>

    <div class="mx-auto max-w-lg card-padded">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-heading">Edit Category</h1>
            <p class="mt-2 text-sm text-paragraph">Update the category label and manage its display in the marketplace.</p>
        </div>

        <form method="POST" action="{{ route('admin.categories.update', $category) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="field-group">
                <x-input-label for="name" value="Category Name" />
                <x-text-input id="name" name="name" value="{{ old('name', $category->name) }}" required class="mt-1" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="btn-primary flex-1">Update Category</button>
            </div>
        </form>

        <div class="mt-6 rounded-xl border border-danger-100 bg-danger-50 p-5">
            <p class="text-sm font-semibold text-danger-700">Danger zone</p>
            <p class="mt-1 text-xs text-danger-600">Deleting a category cannot be undone.</p>
            <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" class="mt-3" onsubmit="return confirm('Delete this category?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-danger w-full">Delete Category</button>
            </form>
        </div>
    </div>
@endsection
