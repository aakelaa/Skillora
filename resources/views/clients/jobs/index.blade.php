@extends('layouts.dashboard')

@section('title', 'My Jobs')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">My Jobs</h1>
        <a href="{{ route('clients.jobs.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded text-sm">
            + Post a Job
        </a>
    </div>

    <div class="grid gap-4">
        @forelse ($jobs as $job)
            <div class="bg-white p-4 rounded shadow-sm border flex justify-between items-center">
                <div>
                    <p class="font-semibold">{{ $job->title }}</p>
                    <p class="text-sm text-gray-500">
                        {{ ucfirst($job->status) }} &middot; {{ $job->applications_count }} applications
                        &middot; {{ $job->deadline_countdown }}
                    </p>
                </div>
                <div class="flex gap-3 text-sm">
                    <a href="{{ route('clients.jobs.applications', $job) }}" class="text-indigo-600 hover:underline">
                        View Applicants ({{ $job->applications_count }})
                    </a>
                    <a href="{{ route('clients.jobs.edit', $job) }}" class="text-indigo-600 hover:underline">Edit</a>
                    <form method="POST" action="{{ route('clients.jobs.destroy', $job) }}"
                          onsubmit="return confirm('Delete this job?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-gray-500">You haven't posted any jobs yet.</p>
        @endforelse
    </div>

    <div class="mt-6">{{ $jobs->links() }}</div>
@endsection
