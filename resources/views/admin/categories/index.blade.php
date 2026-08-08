@extends('layouts.dashboard')

@section('title', 'Manage Categories')

@section('content')
    <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-semibold text-heading">Categories</h1>
            <p class="mt-2 text-sm text-paragraph">Create and manage service categories for premium project matches.</p>
        </div>
        <a href="{{ route('admin.categories.create') }}" class="btn-primary inline-flex items-center justify-center px-5 py-3 text-sm">
            + New Category
        </a>
    </div>

    <div class="grid gap-4">
        @forelse ($categories as $category)
            <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-card flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <p class="text-lg font-semibold text-heading">{{ $category->name }}</p>
                    <p class="mt-1 text-xs text-muted">{{ $category->jobs_count }} jobs</p>
                </div>
                <div class="flex flex-wrap items-center gap-3 text-sm">
                    <a href="{{ route('admin.categories.edit', $category) }}" class="text-primary hover:text-primary/80 font-semibold">Edit</a>
                    <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" onsubmit="return confirm('Delete this category?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="rounded-[28px] border border-slate-200 bg-white p-8 shadow-card text-center text-paragraph">No categories yet.</div>
        @endforelse
    </div>

    <div class="mt-8">{{ $categories->links() }}</div>
@endsection
