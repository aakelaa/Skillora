@extends('layouts.frontend')

@section('title', 'Browse Jobs')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-16">
        <div class="rounded-[32px] border border-slate-200 bg-white p-6 shadow-card">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <h1 class="text-3xl font-semibold text-heading">{{ isset($activeCategory) ? $activeCategory->name . ' Jobs' : 'Open Jobs' }}</h1>
                    <p class="mt-2 text-sm text-paragraph">Find the right role and connect with premium clients.</p>
                </div>
                <form method="GET" class="grid gap-3 sm:grid-cols-[1fr_auto] lg:grid-cols-[1.2fr_0.8fr_auto] xl:grid-cols-[1.4fr_0.8fr_auto]">
                    <input type="text" name="keyword" placeholder="Search by title..." value="{{ request('keyword') }}" class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10" />
                    <select name="category" class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected(request('category') == $category->id)>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn-primary rounded-2xl px-6 py-3 text-sm">Search</button>
                </form>
            </div>
        </div>

        <div class="mt-10 grid gap-6 md:grid-cols-2">
            @forelse ($jobs as $job)
                <div class="rounded-[32px] border border-slate-200 bg-white p-6 shadow-card transition hover:-translate-y-1 hover:shadow-soft">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <a href="{{ route('jobs.show', $job) }}" class="text-xl font-semibold text-heading hover:text-primary">{{ $job->title }}</a>
                            <p class="mt-2 text-sm text-muted">Posted by {{ $job->client->name }} @if ($job->category) · {{ $job->category->name }} @endif</p>
                        </div>
                        <div class="text-right">
                            <div class="text-sm font-semibold text-heading">{{ $job->budget_formatted ?? $job->budget }}</div>
                            <div class="text-xs text-muted">{{ $job->deadline_countdown }}</div>
                        </div>
                    </div>
                    <p class="mt-4 text-sm text-paragraph">{{ Str::limit($job->description, 150) }}</p>
                </div>
            @empty
                <div class="rounded-[32px] border border-slate-200 bg-white p-8 shadow-card text-center text-paragraph">No open jobs right now. Check back soon!</div>
            @endforelse
        </div>

        <div class="mt-8">{{ $jobs->links() }}</div>
    </div>
@endsection
