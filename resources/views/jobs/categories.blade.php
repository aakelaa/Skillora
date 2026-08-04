@extends('layouts.app')

@section('title', 'All Categories')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Browse by Category</h1>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @forelse ($categories as $category)
            <a href="{{ route('categories.show', $category) }}"
               class="bg-white p-4 rounded shadow-sm border text-center hover:border-indigo-400">
                <p class="font-medium text-sm">{{ $category->name }}</p>
                <p class="text-xs text-gray-500 mt-1">{{ $category->jobs_count }} jobs</p>
            </a>
        @empty
            <p class="text-gray-500 col-span-full">No categories yet.</p>
        @endforelse
    </div>
@endsection
