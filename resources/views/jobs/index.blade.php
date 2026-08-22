@extends('layouts.frontend')

@section('title', 'Browse Jobs')

@section('content')
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:py-20">
        <div class="card-padded">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <span class="eyebrow">Opportunities</span>
                    <h1 class="mt-3 text-2xl font-extrabold tracking-tight text-heading sm:text-3xl">{{ isset($activeCategory) ? $activeCategory->name . ' Jobs' : 'Open Jobs' }}</h1>
                    <p class="mt-2 text-sm text-paragraph">Find the right role and connect with premium clients.</p>
                </div>
                <form method="GET" class="grid gap-3 sm:grid-cols-[1fr_auto] lg:grid-cols-[1.2fr_0.8fr_auto] xl:grid-cols-[1.4fr_0.8fr_auto]">
                    <input type="text" name="keyword" placeholder="Search by title..." value="{{ request('keyword') }}" />
                    <select name="category">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected(request('category') == $category->id)>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn-primary">Search</button>
                </form>
            </div>
        </div>

        @if ($jobs->count())
            <div class="mt-10 grid gap-6 md:grid-cols-2">
                @foreach ($jobs as $job)
                    <div class="card-padded card-hover">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <a href="{{ route('jobs.show', $job) }}" class="text-lg font-bold text-heading hover:text-primary">{{ $job->title }}</a>
                                <p class="mt-1.5 text-sm text-muted">Posted by {{ $job->client->name }} @if ($job->category) · {{ $job->category->name }} @endif</p>
                            </div>
                            <div class="shrink-0 text-right">
                                <div class="text-sm font-bold text-heading">{{ $job->budget_formatted ?? $job->budget }}</div>
                                <div class="mt-0.5 text-xs text-muted">{{ $job->deadline_countdown }}</div>
                            </div>
                        </div>
                        <p class="mt-4 text-sm text-paragraph">{{ Str::limit($job->description, 150) }}</p>
                        <a href="{{ route('jobs.show', $job) }}" class="btn-outline btn-sm mt-5 inline-flex">View details</a>
                    </div>
                @endforeach
            </div>

            <div class="mt-8">{{ $jobs->links() }}</div>
        @else
            <div class="empty-state mt-10">

                <p class="font-semibold text-heading">No open jobs right now</p>
                <p class="text-sm text-paragraph">Check back soon for new opportunities.</p>
            </div>
        @endif
    </div>
@endsection
