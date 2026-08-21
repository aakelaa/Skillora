@extends('layouts.dashboard')

@section('title', 'Client Dashboard')

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Welcome, {{ auth()->user()->name }}!</h1>
            <p class="page-subtitle">Track your jobs, applications, and hiring activity in one polished dashboard.</p>
        </div>
        <a href="{{ route('clients.jobs.create') }}" class="btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
            Post a New Job
        </a>
    </div>

    <div class="grid gap-5 md:grid-cols-3 mb-10">
        <div class="stat-card">
            <div class="stat-icon bg-info-50 text-info-600">💼</div>
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-muted">Active Job Posts</p>
                <p class="mt-1 text-2xl font-extrabold text-heading">{{ $stats['active_jobs'] }}</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon bg-secondary-100 text-secondary-600">📄</div>
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-muted">Applications Received</p>
                <p class="mt-1 text-2xl font-extrabold text-heading">{{ $stats['applications_received'] }}</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon bg-success-50 text-success-600">🤝</div>
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-muted">Hired Freelancers</p>
                <p class="mt-1 text-2xl font-extrabold text-heading">{{ $stats['hired_count'] }}</p>
            </div>
        </div>
    </div>

    <div class="mb-4 flex items-center justify-between">
        <h3 class="section-title">Your job posts</h3>
        <a href="{{ route('clients.jobs.index') }}" class="text-sm font-semibold text-primary hover:text-primary-700">View all my jobs &rarr;</a>
    </div>

    @if ($jobs->count())
        <div class="table-wrap">
            <div class="table-scroll">
                <table class="table-modern">
                    <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>Applications</th>
                            <th>Status</th>
                            <th>Date Posted</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobs as $job)
                            <tr>
                                <td class="font-semibold text-heading">{{ $job->title }}</td>
                                <td class="text-paragraph">{{ $job->applications_count }}</td>
                                <td>
                                    <span class="{{ $job->status === 'open' ? 'badge-success' : ($job->status === 'hired' ? 'badge-info' : 'badge-neutral') }}">
                                        {{ ucfirst($job->status) }}
                                    </span>
                                </td>
                                <td class="text-muted">{{ $job->created_at->format('M d, Y') }}</td>
                                <td>
                                    <div class="row-actions justify-end">
                                        <a href="{{ route('clients.jobs.applications', $job) }}" class="action-btn-view" title="Applicants">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /></svg>
                                        </a>
                                        <a href="{{ route('clients.jobs.edit', $job) }}" class="action-btn-edit" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" /></svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="empty-state">
            <div class="empty-state-icon">💼</div>
            <p class="font-semibold text-heading">You haven't posted any jobs yet</p>
            <p class="text-sm text-paragraph">Post your first job to start receiving applications.</p>
            <a href="{{ route('clients.jobs.create') }}" class="btn-primary mt-4">+ Post a Job</a>
        </div>
    @endif

@endsection
