@extends('layouts.dashboard')

@section('title', 'Freelancer Dashboard')

@section('content')


    <div class="welcome-band mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div class="relative z-10">
            <h2 class="text-xl font-bold text-white sm:text-2xl">Welcome back, {{ auth()->user()->name }}!</h2>
            <p class="mt-1 text-sm text-primary-100">Track your applications and discover new opportunities with ease.</p>
        </div>
        <a href="{{ route('jobs.index') }}" class="relative z-10 inline-flex items-center justify-center gap-2 self-start rounded-xl bg-white/15 px-5 py-2.5 text-sm font-bold text-white backdrop-blur transition hover:bg-white/25">
            Browse all jobs
        </a>
    </div>

    <div class="grid gap-4 lg:grid-cols-[1.3fr_1fr_1fr] mb-10">



        <div class="stat-card">
            <div class="stat-icon bg-secondary-50 text-secondary-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>
            </div>
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-muted">Hired</p>
                <p class="mt-1 text-2xl font-extrabold text-heading">{{ $stats['hired'] }}</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon bg-info-50 text-info-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09Z" /></svg>
            </div>
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-muted">New job matches</p>
                <p class="mt-1 text-2xl font-extrabold text-heading">{{ $stats['new_matches'] }}</p>
            </div>
        </div>
    </div>

    <div class="mb-4 flex items-center justify-between">
        <div>
            <h2 class="section-title">Recommended jobs</h2>
            <p class="text-sm text-paragraph">Opportunities selected based on your profile and skills.</p>
        </div>
        <a href="{{ route('jobs.index') }}" class="text-sm font-semibold text-primary hover:text-primary-700">Browse all &rarr;</a>
    </div>

    <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3 mb-10">
        @forelse ($recommendedJobs as $job)
            <div class="card-padded card-hover flex flex-col">
                <div class="flex items-start justify-between gap-3">
                    <div class="flex items-start gap-3">
                        <span class="icon-chip">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="7" width="18" height="13" rx="2" /><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" /></svg>
                        </span>
                        <div>
                            <h3 class="font-bold text-heading">{{ $job->title }}</h3>
                            <p class="mt-1 text-sm text-muted">{{ $job->category->name ?? 'General' }} · {{ $job->client->name }}</p>
                        </div>
                    </div>
                </div>
                <div class="mt-5 flex items-center justify-between border-t border-border pt-4">
                    <span class="badge-info">{{ $job->budget }}</span>
                    <a href="{{ route('jobs.show', $job) }}" class="btn-primary btn-sm">Apply Now</a>
                </div>
            </div>
        @empty
            <div class="empty-state md:col-span-2 lg:col-span-3">

                <p class="font-semibold text-heading">No new job matches right now</p>
                <p class="text-sm text-paragraph">Check back soon for new opportunities.</p>
            </div>
        @endforelse
    </div>

    <div class="mb-4 flex items-center justify-between">
        <div>
            <h2 class="section-title">My recent applications</h2>
            <p class="text-sm text-paragraph">See the latest responses to your proposals.</p>
        </div>
        <a href="{{ route('freelancer.applications') }}" class="text-sm font-semibold text-primary hover:text-primary-700">View all &rarr;</a>
    </div>

    @if ($recentApplications->count())
        <div class="table-wrap">
            <div class="table-scroll">
                <table class="table-modern">
                    <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>Applied On</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recentApplications as $application)
                            <tr>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <span class="icon-chip">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="7" width="18" height="13" rx="2" /><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" /></svg>
                                        </span>
                                        <a href="{{ route('jobs.show', $application->job_id) }}" class="font-semibold text-heading hover:text-primary">{{ $application->job->title }}</a>
                                    </div>
                                </td>
                                <td class="text-paragraph">{{ $application->created_at->format('M d, Y') }}</td>
                                <td>
                                    <span class="{{ $application->status === 'pending' ? 'badge-warning' : ($application->status === 'hired' ? 'badge-success' : 'badge-danger') }}">
                                        {{ ucfirst($application->status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="empty-state">

            <p class="font-semibold text-heading">You haven't applied to any jobs yet</p>
            <p class="text-sm text-paragraph">Browse open jobs and submit your first application.</p>
            <a href="{{ route('jobs.index') }}" class="btn-primary mt-4">Browse Jobs</a>
        </div>
    @endif

@endsection
