@extends('layouts.frontend')

@section('title', 'Find the Perfect Freelancer')

@section('content')

    @include('partials.frontend.hero')

    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6">
        <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div>
                <span class="eyebrow">Fresh opportunities</span>
                <h2 class="mt-3 text-2xl font-bold text-heading sm:text-3xl">Featured Jobs</h2>
                <p class="mt-2 text-sm text-paragraph">Explore the latest opportunities from trusted clients.</p>
            </div>
            <a href="{{ route('jobs.index') }}" class="btn-secondary self-start">View all jobs</a>
        </div>

        <div class="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @forelse (\App\Models\Job::open()->with('client', 'category')->latest()->take(6)->get() as $job)
                <div class="card-padded card-hover flex flex-col">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <h3 class="text-lg font-bold text-heading">{{ $job->title }}</h3>
                            <p class="mt-1.5 text-sm text-muted">{{ $job->category->name ?? 'General' }} · {{ $job->client->name }}</p>
                        </div>
                        <span class="badge-info shrink-0">{{ $job->budget_formatted ?? $job->budget }}</span>
                    </div>

                    <p class="mt-4 flex-1 text-sm text-paragraph">{{ Str::limit($job->description, 120) }}</p>

                    <div class="mt-6 flex items-center justify-between gap-4 border-t border-border pt-4">
                        <span class="text-xs font-medium text-muted">{{ $job->deadline_countdown }}</span>
                        <a href="{{ route('jobs.show', $job) }}" class="btn-primary btn-sm">View job</a>
                    </div>
                </div>
            @empty
                <div class="empty-state md:col-span-2 lg:col-span-3">
                    <div class="empty-state-icon">💼</div>
                    <p class="font-semibold text-heading">No open jobs right now</p>
                    <p class="text-sm text-paragraph">Check back soon for new opportunities.</p>
                </div>
            @endforelse
        </div>
    </section>

    @include('partials.frontend.stats')

    <section class="bg-white py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6">
            <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                <div>
                    <span class="eyebrow">Explore by skill</span>
                    <h2 class="mt-3 text-2xl font-bold text-heading sm:text-3xl">Popular categories</h2>
                    <p class="mt-2 text-sm text-paragraph">Browse jobs by skill area to find the best match faster.</p>
                </div>
                <a href="{{ route('categories.index') }}" class="text-sm font-semibold text-primary hover:text-primary-700">View all categories →</a>
            </div>

            <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                @foreach(\App\Models\Category::withCount('jobs')->take(8)->get() as $category)
                    <a href="{{ route('categories.show', $category) }}" class="card card-hover flex items-center gap-4 p-5">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-primary-50 text-primary-600 text-lg font-bold">
                            {{ strtoupper(substr($category->name, 0, 1)) }}
                        </div>
                        <div>
                            <div class="font-semibold text-heading">{{ $category->name }}</div>
                            <div class="text-xs text-muted">{{ $category->jobs_count }}+ Jobs</div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    @include('partials.frontend.testimonials')

    @include('partials.frontend.cta')

@endsection
