@extends('layouts.dashboard')

@section('title', 'Freelancer Dashboard')

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Welcome back, {{ auth()->user()->name }}!</h1>
            <p class="page-subtitle">Track your applications and discover new opportunities with ease.</p>
        </div>
        <a href="{{ route('jobs.index') }}" class="btn-secondary">Browse all jobs</a>
    </div>

    <div class="grid gap-5 md:grid-cols-3 mb-10">
        <div class="stat-card">

            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-muted">Active applications</p>
                <p class="mt-1 text-2xl font-extrabold text-heading">{{ $stats['active_applications'] }}</p>
            </div>
        </div>
        <div class="stat-card">

            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-muted">Hired</p>
                <p class="mt-1 text-2xl font-extrabold text-heading">{{ $stats['hired'] }}</p>
            </div>
        </div>
        <div class="stat-card">

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
                    <div>
                        <h3 class="font-bold text-heading">{{ $job->title }}</h3>
                        <p class="mt-1.5 text-sm text-muted">{{ $job->category->name ?? 'General' }} · {{ $job->client->name }}</p>
                    </div>
                    <span class="badge-info shrink-0">{{ $job->budget }}</span>
                </div>
                <div class="mt-5 flex items-center justify-between border-t border-border pt-4">
                    <span class="text-xs font-medium text-muted">{{ $job->deadline_countdown }}</span>
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
                                <td class="font-semibold text-heading">
                                    <a href="{{ route('jobs.show', $application->job_id) }}" class="hover:text-primary">{{ $application->job->title }}</a>
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
