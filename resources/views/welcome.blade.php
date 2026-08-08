@extends('layouts.frontend')

@section('title', 'Find the Perfect Freelancer')

@section('content')

    @include('partials.frontend.hero')

    <section class="max-w-7xl mx-auto px-4 py-16">
        <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="text-3xl font-semibold text-heading">Featured Jobs</h2>
                <p class="mt-2 text-sm text-paragraph">Explore the latest opportunities from trusted clients.</p>
            </div>
            <a href="{{ route('jobs.index') }}" class="btn-secondary">View all jobs</a>
        </div>

        <div class="mt-10 grid gap-6 md:grid-cols-3">
            @forelse (\App\Models\Job::open()->with('client', 'category')->latest()->take(6)->get() as $job)
                <div class="rounded-[32px] border border-slate-200 bg-white p-6 shadow-card transition hover:-translate-y-1 hover:shadow-soft">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <h3 class="text-lg font-semibold text-heading">{{ $job->title }}</h3>
                            <p class="mt-2 text-sm text-muted">{{ $job->category->name ?? 'General' }} · {{ $job->client->name }}</p>
                        </div>
                        <span class="rounded-full bg-primary/10 px-3 py-1 text-sm font-semibold text-primary">{{ $job->budget_formatted ?? $job->budget }}</span>
                    </div>

                    <p class="mt-4 text-sm text-paragraph">{{ Str::limit($job->description, 120) }}</p>
                    <div class="mt-6 flex items-center justify-between gap-4">
                        <div class="text-sm text-muted">{{ $job->deadline_countdown }}</div>
                        <a href="{{ route('jobs.show', $job) }}" class="btn-primary px-4 py-2 text-sm">View</a>
                    </div>
                </div>
            @empty
                <p class="text-center text-paragraph">No open jobs right now — check back soon!</p>
            @endforelse
        </div>
    </section>

    @include('partials.frontend.stats')

    <section class="max-w-7xl mx-auto px-4 py-16">
        <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="text-3xl font-semibold text-heading">Popular categories</h2>
                <p class="mt-2 text-sm text-paragraph">Browse jobs by skill area to find the best match faster.</p>
            </div>
            <a href="{{ route('categories.index') }}" class="text-sm font-semibold text-primary hover:text-primary/80">View all categories →</a>
        </div>

        <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @foreach(\App\Models\Category::withCount('jobs')->take(8)->get() as $category)
                <a href="{{ route('categories.show', $category) }}" class="rounded-[28px] border border-slate-200 bg-white p-5 shadow-card transition hover:-translate-y-1 hover:shadow-soft flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-3xl bg-primary/10 text-primary text-lg font-semibold">#</div>
                    <div>
                        <div class="text-base font-semibold text-heading">{{ $category->name }}</div>
                        <div class="text-xs text-muted">{{ $category->jobs_count }}+ Jobs</div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    @include('partials.frontend.testimonials')

    @include('partials.frontend.cta')

@endsection
