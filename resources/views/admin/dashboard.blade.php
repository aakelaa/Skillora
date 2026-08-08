@extends('layouts.dashboard')

@section('title', 'Admin Dashboard')

@section('content')

    <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between mb-8">
        <div>
            <h2 class="text-3xl font-semibold text-heading">Welcome, {{ auth()->user()->name }}!</h2>
            <p class="text-sm text-paragraph">Monitor users, jobs, and account approvals from one premium dashboard.</p>
        </div>
        <a href="{{ route('admin.categories.create') }}" class="btn-primary inline-flex items-center gap-2 px-5 py-3 text-sm">
            <span>+</span> New Category
        </a>
    </div>

    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4 mb-10">
        <div class="rounded-[32px] border border-slate-200 bg-white p-6 shadow-card flex items-center gap-4">
            <div class="flex h-14 w-14 items-center justify-center rounded-3xl bg-blue-100 text-blue-600 text-xl">U</div>
            <div>
                <p class="text-xs uppercase tracking-[0.24em] text-muted">Total users</p>
                <p class="mt-2 text-2xl font-semibold text-heading">{{ $stats['clients'] + $stats['freelancers'] }}</p>
            </div>
        </div>
        <div class="rounded-[32px] border border-slate-200 bg-white p-6 shadow-card flex items-center gap-4">
            <div class="flex h-14 w-14 items-center justify-center rounded-3xl bg-green-100 text-green-600 text-xl">J</div>
            <div>
                <p class="text-xs uppercase tracking-[0.24em] text-muted">Active jobs</p>
                <p class="mt-2 text-2xl font-semibold text-heading">{{ $stats['open_jobs'] }}</p>
            </div>
        </div>
        <div class="rounded-[32px] border border-slate-200 bg-white p-6 shadow-card flex items-center gap-4">
            <div class="flex h-14 w-14 items-center justify-center rounded-3xl bg-orange-100 text-orange-600 text-xl">A</div>
            <div>
                <p class="text-xs uppercase tracking-[0.24em] text-muted">Applications</p>
                <p class="mt-2 text-2xl font-semibold text-heading">{{ $stats['applications_received'] }}</p>
            </div>
        </div>
        <div class="rounded-[32px] border border-slate-200 bg-white p-6 shadow-card flex items-center gap-4">
            <div class="flex h-14 w-14 items-center justify-center rounded-3xl bg-purple-100 text-purple-600 text-xl">H</div>
            <div>
                <p class="text-xs uppercase tracking-[0.24em] text-muted">Hired</p>
                <p class="mt-2 text-2xl font-semibold text-heading">{{ $stats['hired_count'] }}</p>
            </div>
        </div>
    </div>

    <div class="rounded-[32px] border border-slate-200 bg-white p-6 shadow-card overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-slate-50 text-left text-sm text-muted uppercase tracking-[0.18em]">
                <tr>
                    <th class="px-5 py-4">Job Title</th>
                    <th class="px-5 py-4">Client</th>
                    <th class="px-5 py-4">Posted</th>
                    <th class="px-5 py-4">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($recentJobs as $job)
                    <tr>
                        <td class="px-5 py-4 font-medium text-heading">{{ $job->title }}</td>
                        <td class="px-5 py-4 text-muted">{{ $job->client->name }}</td>
                        <td class="px-5 py-4 text-muted">{{ $job->created_at->format('M d, Y') }}</td>
                        <td class="px-5 py-4">
                            <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $job->status === 'open' ? 'bg-green-100 text-green-700' : ($job->status === 'hired' ? 'bg-blue-100 text-blue-700' : 'bg-gray-100 text-gray-600') }}">
                                {{ ucfirst($job->status) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-5 py-6 text-center text-muted">No jobs yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
