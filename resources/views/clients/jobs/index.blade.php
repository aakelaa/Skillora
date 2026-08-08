@extends('layouts.dashboard')

@section('title', 'My Jobs')

@section('content')
    <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between mb-8">
        <div>
            <h1 class="text-2xl font-semibold text-heading">My Jobs</h1>
            <p class="mt-2 text-sm text-paragraph">Review and manage your job posts from one polished workspace.</p>
        </div>
        <a href="{{ route('clients.jobs.create') }}" class="btn-primary inline-flex items-center justify-center px-5 py-3 text-sm">
            + Post a Job
        </a>
    </div>

    <div class="grid gap-4">
        @forelse ($jobs as $job)
            <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-card flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <p class="text-lg font-semibold text-heading">{{ $job->title }}</p>
                    <p class="mt-2 text-sm text-muted">{{ ucfirst($job->status) }} · {{ $job->applications_count }} applications · {{ $job->deadline_countdown }}</p>
                </div>
                <div class="flex flex-wrap items-center gap-3 text-sm">
                    <a href="{{ route('clients.jobs.applications', $job) }}" class="text-primary font-semibold hover:text-primary/80">View Applicants ({{ $job->applications_count }})</a>
                    <a href="{{ route('clients.jobs.edit', $job) }}" class="text-primary font-semibold hover:text-primary/80">Edit</a>
                    <form method="POST" action="{{ route('clients.jobs.destroy', $job) }}" onsubmit="return confirm('Delete this job?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 font-semibold hover:text-red-800">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="rounded-[28px] border border-slate-200 bg-white p-8 shadow-card text-center text-paragraph">You haven't posted any jobs yet.</div>
        @endforelse
    </div>

    <div class="mt-8">{{ $jobs->links() }}</div>
@endsection
