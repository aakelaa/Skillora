@extends('layouts.dashboard')

@section('title', 'Admin Dashboard')

@section('content')

    <div class="welcome-band mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div class="relative z-10">
            <h2 class="text-xl font-bold text-white sm:text-2xl">Welcome, {{ auth()->user()->name }}! </h2>
            <p class="mt-1 text-sm text-primary-100">Monitor users, jobs, and account approvals from one premium dashboard.</p>
        </div>
        <a href="{{ route('admin.categories.create') }}" class="relative z-10 inline-flex items-center justify-center gap-2 self-start rounded-xl bg-secondary px-5 py-2.5 text-sm font-bold shadow-lg transition hover:-translate-y-0.5" style="color:#3A2708;">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
            New Category
        </a>
    </div>

   <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 mb-10">



        <div class="stat-card">
            <div class="stat-icon bg-info-50 text-info-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Z" /></svg>
            </div>
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-muted">Total users</p>
                <p class="mt-1 text-2xl font-extrabold text-heading">{{ $stats['clients'] + $stats['freelancers'] }}</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon bg-primary-50 text-primary-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="7" width="18" height="13" rx="2" /><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" /></svg>
            </div>
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-muted">Active jobs</p>
                <p class="mt-1 text-2xl font-extrabold text-heading">{{ $stats['open_jobs'] }}</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon bg-secondary-50 text-secondary-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" /><circle cx="9" cy="7" r="4" /><path stroke-linecap="round" stroke-linejoin="round" d="m17 11 2 2 4-4" /></svg>
            </div>
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
                            <td>
                                <div class="flex items-center gap-3">
                                    <span class="icon-chip">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="7" width="18" height="13" rx="2" /><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" /></svg>
                                    </span>
                                    <span class="font-semibold text-heading">{{ $job->title }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="flex items-center gap-2.5 text-paragraph">
                                    <span class="avatar-chip-sm">{{ strtoupper(substr($job->client->name, 0, 1)) }}</span>
                                    {{ $job->client->name }}
                                </div>
                            </td>
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
