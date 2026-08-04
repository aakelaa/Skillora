@extends('layouts.dashboard')

@section('title', 'Manage Categories')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Categories</h1>
        <a href="{{ route('admin.categories.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded text-sm">
            + New Category
        </a>
    </div>

    <div class="grid gap-3">
        @forelse ($categories as $category)
            <div class="bg-white p-4 rounded shadow-sm border flex justify-between items-center">
                <div>
                    <p class="font-semibold">{{ $category->name }}</p>
                    <p class="text-xs text-gray-500">{{ $category->jobs_count }} jobs</p>
                </div>
                <div class="flex gap-3 text-sm">
                    <a href="{{ route('admin.categories.edit', $category) }}" class="text-indigo-600 hover:underline">Edit</a>
                    <form method="POST" action="{{ route('admin.categories.destroy', $category) }}"
                          onsubmit="return confirm('Delete this category?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-gray-500">No categories yet.</p>
        @endforelse
    </div>

    <div class="mt-6">{{ $categories->links() }}</div>
@endsection
