@extends('layouts.dashboard')

@section('title', 'Client Dashboard')

@section('content')

    <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between mb-8">
        <div>
            <h1 class="text-2xl font-semibold text-heading">Welcome, {{ auth()->user()->name }}!</h1>
            <p class="text-sm text-paragraph">Track your jobs, applications, and hiring activity in one polished dashboard.</p>
        </div>
        <a href="{{ route('clients.jobs.create') }}" class="btn-primary inline-flex items-center gap-2 px-5 py-3 text-sm">+ Post a New Job</a>
    </div>

    <div class="grid gap-6 md:grid-cols-3 mb-10">
        <div class="rounded-[32px] border border-slate-200 bg-white p-6 shadow-card flex items-center gap-4">
            <div class="flex h-14 w-14 items-center justify-center rounded-3xl bg-blue-100 text-blue-600 text-xl">J</div>
            <div>
                <p class="text-xs uppercase tracking-[0.20em] font-semibold">Active Job Posts</p>
                <p class="mt-2 text-1xl font-semibold text-heading">{{ $stats['active_jobs'] }}</p>
            </div>
        </div>
        <div class="rounded-[32px] border border-slate-200 bg-white p-6 shadow-card flex items-center gap-4">
            <div class="flex h-14 w-14 items-center justify-center rounded-3xl bg-sky-100 text-sky-600 text-xl">A</div>
            <div>
                <p class="text-xs uppercase tracking-[0.20em] font-semibold">Applications Received</p>
                <p class="mt-2 text-1xl font-semibold text-heading">{{ $stats['applications_received'] }}</p>
            </div>
        </div>
        <div class="rounded-[32px] border border-slate-200 bg-white p-6 shadow-card flex items-center gap-4">
            <div class="flex h-14 w-14 items-center justify-center rounded-3xl bg-orange-100 text-orange-600 text-xl">H</div>
            <div>
                <p class="text-xs uppercase tracking-[0.20em] font-semibold">Hired Freelancers</p>
                <p class="mt-2 text-1xl font-semibold text-heading">{{ $stats['hired_count'] }}</p>
            </div>
        </div>
    </div>

    <div class="rounded-[32px] border border-slate-200 bg-white p-6 shadow-card overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-slate-50 text-left text-sm uppercase tracking-[0.18em] text-muted">
                <tr>
                    <th class="px-6 py-4">Job Title</th>
                    <th class="px-6 py-4">Applications</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Date Posted</th>
                    <th class="px-6 py-4">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($jobs as $job)
                    <tr>
                        <td class="px-6 py-4 font-medium text-heading">{{ $job->title }}</td>
                        <td class="px-6 py-4 text-paragraph">{{ $job->applications_count }}</td>
                        <td class="px-6 py-4">
                            <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $job->status === 'open' ? 'bg-green-100 text-green-700' : ($job->status === 'hired' ? 'bg-blue-100 text-blue-700' : 'bg-gray-100 text-gray-600') }}">
                                {{ ucfirst($job->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-muted">{{ $job->created_at->format('M d, Y') }}</td>
                        <td class="px-6 py-4 space-x-3 text-sm">
                            <a href="{{ route('clients.jobs.applications', $job) }}" class="text-primary hover:underline">Applicants</a>
                            <a href="{{ route('clients.jobs.edit', $job) }}" class="text-primary hover:underline">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-6 py-8 text-center text-paragraph">You haven't posted any jobs yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6 text-right">
        <a href="{{ route('clients.jobs.index') }}" class="text-sm font-semibold text-primary hover:text-primary/80">View all my jobs &rarr;</a>
    </div>

@endsection
