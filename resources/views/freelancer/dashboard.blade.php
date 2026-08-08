@extends('layouts.dashboard')

@section('title', 'Freelancer Dashboard')

@section('content')

    <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between mb-8">
        <div>
            <h1 class="text-2xl font-semibold text-heading">Welcome back, {{ auth()->user()->name }}!</h1>
            <p class="text-sm text-paragraph">Track your applications and discover new opportunities with ease.</p>
        </div>
        <a href="{{ route('jobs.index') }}" class="btn-secondary inline-flex items-center justify-center px-5 py-3 text-sm">Browse all jobs</a>
    </div>

    <div class="grid gap-6 md:grid-cols-3 mb-10">
        <div class="rounded-[32px] border border-slate-200 bg-white p-6 shadow-card flex items-center gap-4">
            <div class="flex h-14 w-14 items-center justify-center rounded-3xl bg-blue-100 text-blue-600 text-xl">A</div>
            <div>
                <p class="text-xs uppercase tracking-[0.20em] font-semibold">Active applications</p>
                <p class="mt-2 text-1xl font-semibold text-heading">{{ $stats['active_applications'] }}</p>
            </div>
        </div>
        <div class="rounded-[32px] border border-slate-200 bg-white p-6 shadow-card flex items-center gap-4">
            <div class="flex h-14 w-14 items-center justify-center rounded-3xl bg-green-100 text-green-600 text-xl">H</div>
            <div>
                <p class="text-xs uppercase tracking-[0.20em] font-semibold">Hired</p>
                <p class="mt-2 text-1xl font-semibold text-heading">{{ $stats['hired'] }}</p>
            </div>
        </div>
        <div class="rounded-[32px] border border-slate-200 bg-white p-6 shadow-card flex items-center gap-4">
            <div class="flex h-14 w-14 items-center justify-center rounded-3xl bg-orange-100 text-orange-600 text-xl">M</div>
            <div>
                <p class="text-xs uppercase tracking-[0.20em] font-semibold">New job matches</p>
                <p class="mt-2 text-1xl font-semibold text-heading">{{ $stats['new_matches'] }}</p>
            </div>
        </div>
    </div>

    <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between mb-4">
        <div>
            <h2 class="text-xl font-semibold text-heading">Recommended jobs</h2>
            <p class="text-sm text-paragraph">Opportunities selected based on your profile and skills.</p>
        </div>
        <a href="{{ route('jobs.index') }}" class="text-sm font-semibold text-primary hover:text-primary/80">Browse all &rarr;</a>
    </div>

    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 mb-10">
        @forelse ($recommendedJobs as $job)
            <div class="rounded-[32px] border border-slate-200 bg-white p-6 shadow-card transition hover:-translate-y-1 hover:shadow-soft">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <h3 class="text-m font-semibold text-heading">{{ $job->title }}</h3>
                        <p class="mt-2 text-sm text-muted">{{ $job->category->name ?? 'General' }} · {{ $job->client->name }}</p>
                    </div>
                    <span class="rounded-full bg-primary/10 px-3 py-1 text-sm font-semibold text-primary">{{ $job->budget }}</span>
                </div>
                <div class="mt-5 flex items-center justify-between">
                    <span class="text-sm text-paragraph">{{ $job->deadline_countdown }}</span>
                    <a href="{{ route('jobs.show', $job) }}" class="btn-primary px-4 py-2 text-xs">Apply Now</a>
                </div>
            </div>
        @empty
            <div class="rounded-[32px] border border-slate-200 bg-white p-8 shadow-card text-center text-paragraph">No new job matches right now — check back soon!</div>
        @endforelse
    </div>

    <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between mb-4">
        <div>
            <h2 class="text-xl font-semibold text-heading">My recent applications</h2>
            <p class="text-sm text-paragraph">See the latest responses to your proposals.</p>
        </div>
        <a href="{{ route('freelancer.applications') }}" class="text-sm font-semibold text-primary hover:text-primary/80">View all &rarr;</a>
    </div>

    <div class="overflow-hidden rounded-[32px] border border-slate-200 bg-white shadow-card">
        <table class="min-w-full text-sm">
            <thead class="bg-slate-50 text-left text-sm uppercase tracking-[0.18em] text-muted">
                <tr>
                    <th class="px-6 py-4">Job Title</th>
                    <th class="px-6 py-4">Applied On</th>
                    <th class="px-6 py-4">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($recentApplications as $application)
                    <tr>
                        <td class="px-6 py-4 font-medium text-heading">
                            <a href="{{ route('jobs.show', $application->job_id) }}" class="hover:text-primary">{{ $application->job->title }}</a>
                        </td>
                        <td class="px-6 py-4 text-paragraph">{{ $application->created_at->format('M d, Y') }}</td>
                        <td class="px-6 py-4">
                            <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $application->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : ($application->status === 'hired' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700') }}">
                                {{ ucfirst($application->status) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="px-6 py-8 text-center text-paragraph">You haven't applied to any jobs yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
