@extends('layouts.dashboard')

@section('title', 'Applicants')

@section('content')

    <div class="mb-6">
        <a href="{{ route('clients.jobs.index') }}" class="text-sm text-indigo-600 hover:underline">&larr; Back to My Jobs</a>
        <h2 class="text-xl font-bold mt-2">{{ $job->title }}</h2>
        <p class="text-sm text-gray-500">Status: {{ ucfirst($job->status) }}</p>
    </div>

    <div class="grid gap-4">
        @forelse ($applications as $application)
            <div class="bg-white p-4 rounded-xl border">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="font-semibold">{{ $application->freelancer->name }}</p>
                        <p class="text-xs text-gray-500">{{ $application->freelancer->email }}</p>
                    </div>
                    <span class="text-xs px-2 py-1 rounded-full
                        {{ $application->status === 'hired' ? 'bg-green-100 text-green-700' : '' }}
                        {{ $application->status === 'rejected' ? 'bg-red-100 text-red-700' : '' }}
                        {{ $application->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : '' }}">
                        {{ ucfirst($application->status) }}
                    </span>
                </div>

                <p class="text-sm text-gray-700 mt-3">{{ $application->cover_letter }}</p>

                @if ($application->status === 'pending')
                    <div class="flex gap-3 mt-4">
                        <form method="POST" action="{{ route('clients.applications.hire', $application) }}">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded text-sm"
                                    onclick="return confirm('Hire this freelancer? This will close the job.');">
                                Hire
                            </button>
                        </form>
                        <form method="POST" action="{{ route('clients.applications.reject', $application) }}">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="border border-red-300 text-red-700 px-4 py-2 rounded text-sm">
                                Reject
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        @empty
            <p class="text-gray-500">No applications yet for this job.</p>
        @endforelse
    </div>

@endsection
