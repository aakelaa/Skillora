@extends('layouts.frontend')

@section('title', 'All Categories')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-16">
        <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-heading">Browse categories</h1>
                <p class="mt-2 text-sm text-paragraph">Explore jobs by skill area to find the right opportunity faster.</p>
            </div>
            <p class="text-sm text-muted">{{ $categories->count() }} categories available</p>
        </div>

        <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @forelse ($categories as $category)
                <a href="{{ route('categories.show', $category) }}" class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-card transition hover:-translate-y-1 hover:shadow-soft flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-3xl bg-primary/10 text-primary text-lg font-semibold">#</div>
                    <div>
                        <div class="text-base font-semibold text-heading">{{ $category->name }}</div>
                        <div class="mt-1 text-xs text-muted">{{ $category->jobs_count }} jobs</div>
                    </div>
                </a>
            @empty
                <div class="rounded-[32px] border border-slate-200 bg-white p-8 shadow-card text-center text-paragraph">No categories yet.</div>
            @endforelse
        </div>
    </div>
@endsection
