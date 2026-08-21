@extends('layouts.frontend')

@section('title', 'All Categories')

@section('content')
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:py-20">
        <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div>
                <span class="eyebrow">Explore by skill</span>
                <h1 class="mt-3 text-3xl font-extrabold tracking-tight text-heading">Browse categories</h1>
                <p class="mt-2 text-sm text-paragraph">Explore jobs by skill area to find the right opportunity faster.</p>
            </div>
            <p class="text-sm font-medium text-muted">{{ $categories->count() }} categories available</p>
        </div>

        <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @forelse ($categories as $category)
                <a href="{{ route('categories.show', $category) }}" class="card card-hover flex items-center gap-4 p-5">
                 <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-primary-50 text-primary-600 text-lg font-bold">
                        #
                    </div>
                    <div>
                        <div class="font-semibold text-heading">{{ $category->name }}</div>
                        <div class="mt-0.5 text-xs text-muted">{{ $category->jobs_count }} jobs</div>
                    </div>
                </a>
            @empty
                <div class="empty-state sm:col-span-2 lg:col-span-4">

                    <p class="font-semibold text-heading">No categories yet</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
