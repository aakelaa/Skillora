@extends('layouts.dashboard')

@section('title', 'Admin Dashboard')

@section('content')

    <div class="page-header">
        <div>
            <h2 class="page-title">Welcome, {{ auth()->user()->name }}!</h2>
            <p class="page-subtitle">Monitor users, jobs, and account approvals from one premium dashboard.</p>
        </div>
        <a href="{{ route('admin.categories.create') }}" class="btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
            New Category
        </a>
    </div>

    <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-4 mb-10">
        <div class="stat-card">
            <div class="stat-icon bg-info-50 text-info-600">👥</div>
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-muted">Total users</p>
                <p class="mt-1 text-2xl font-extrabold text-heading">{{ $stats['clients'] + $stats['freelancers'] }}</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon bg-success-50 text-success-600">💼</div>
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-muted">Active jobs</p>
                <p class="mt-1 text-2xl font-extrabold text-heading">{{ $stats['open_jobs'] }}</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon bg-warning-50 text-warning-600">📄</div>
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-muted">Applications</p>
                <p class="mt-1 text-2xl font-extrabold text-heading">{{ $stats['applications_received'] }}</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon bg-primary-50 text-primary-600">🤝</div>
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-muted">Hired</p>
                <p class="mt-1 text-2xl font-extrabold text-heading">{{ $stats['hired_count'] }}</p>
            </div>
        </div>
    </div>

    <div class="mb-4 flex items-center justify-between">
        <h3 class="section-title">Recent jobs</h3>
        <a href="{{ route('jobs.index') }}" class="text-sm font-semibold text-primary hover:text-primary-700">View all &rarr;</a>
    </div>

    <div class="table-wrap">
        <div class="table-scroll">
            <table class="table-modern">
                <thead>
                    <tr>
                        <th>Job Title</th>
                        <th>Client</th>
                        <th>Posted</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($recentJobs as $job)
                        <tr>
                            <td class="font-semibold text-heading">{{ $job->title }}</td>
                            <td class="text-paragraph">{{ $job->client->name }}</td>
                            <td class="text-muted">{{ $job->created_at->format('M d, Y') }}</td>
                            <td>
                                <span class="{{ $job->status === 'open' ? 'badge-success' : ($job->status === 'hired' ? 'badge-info' : 'badge-neutral') }}">
                                    {{ ucfirst($job->status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="px-6 py-10 text-center text-muted">No jobs yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
