@extends('layouts.dashboard')

@section('title', 'My Applications')

@section('content')

    <div class="rounded-[32px] border border-slate-200 bg-white shadow-card overflow-hidden">
        <div class="border-b border-slate-200 bg-slate-50 px-6 py-5">
            <h1 class="text-xl font-semibold text-heading">My Applications</h1>
            <p class="mt-1 text-sm text-paragraph">Track your applied jobs and see status updates at a glance.</p>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200 text-sm">
                <thead class="bg-white text-left text-slate-500 uppercase tracking-[0.18em] text-[11px]">
                    <tr>
                        <th class="px-6 py-4">Job Title</th>
                        <th class="px-6 py-4">Budget</th>
                        <th class="px-6 py-4">Applied On</th>
                        <th class="px-6 py-4">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 bg-white">
                    @forelse ($applications as $application)
                        <tr class="hover:bg-slate-50">
                            <td class="px-6 py-4 font-medium text-heading">
                                <a href="{{ route('jobs.show', $application->job_id) }}" class="hover:underline">{{ $application->job->title }}</a>
                            </td>
                            <td class="px-6 py-4 text-paragraph">{{ $application->job->budget }}</td>
                            <td class="px-6 py-4 text-muted">{{ $application->created_at->format('M d, Y') }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $application->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : ($application->status === 'hired' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700') }}">
                                    {{ ucfirst($application->status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="px-6 py-8 text-center text-paragraph">You haven't applied to any jobs yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">{{ $applications->links() }}</div>

@endsection
