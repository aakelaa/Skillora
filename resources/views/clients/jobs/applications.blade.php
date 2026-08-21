@extends('layouts.dashboard')

@section('title', 'Applicants')

@section('content')

    <div class="mb-6">
        <a href="{{ route('clients.jobs.index') }}" class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary hover:text-primary-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" /></svg>
            Back to My Jobs
        </a>
    </div>

    <div class="card-padded mb-8 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-xl font-bold text-heading">{{ $job->title }}</h2>
            <p class="mt-1 text-sm text-muted">{{ $applications->total() }} total applicants</p>
        </div>
        <span class="{{ $job->status === 'open' ? 'badge-success' : ($job->status === 'hired' ? 'badge-info' : 'badge-neutral') }}">{{ ucfirst($job->status) }}</span>
    </div>

    @if ($applications->count())
        <div class="grid gap-4">
            @foreach ($applications as $application)
                <div class="card-padded">
                    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                        <div class="flex items-center gap-3">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-primary-50 font-bold text-primary-600">
                                {{ strtoupper(substr($application->freelancer->name, 0, 1)) }}
                            </span>
                            <div>
                                <p class="font-bold text-heading">{{ $application->freelancer->name }}</p>
                                <p class="text-sm text-muted">{{ $application->freelancer->email }}</p>
                            </div>
                        </div>
                        <span class="{{ $application->status === 'hired' ? 'badge-success' : ($application->status === 'rejected' ? 'badge-danger' : 'badge-warning') }}">
                            {{ ucfirst($application->status) }}
                        </span>
                    </div>

                    <p class="mt-4 rounded-xl bg-background p-4 text-sm leading-7 text-paragraph">{{ $application->cover_letter }}</p>

                    @if ($application->status === 'pending')
                        <div class="mt-5 flex flex-col gap-3 sm:flex-row">
                            <form method="POST" action="{{ route('clients.applications.hire', $application) }}" class="w-full sm:w-auto">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn-primary w-full" onclick="return confirm('Hire this freelancer? This will close the job.');">
                                    Hire freelancer
                                </button>
                            </form>
                            <form method="POST" action="{{ route('clients.applications.reject', $application) }}" class="w-full sm:w-auto">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn-secondary w-full !border-danger-100 !text-danger-600 hover:!bg-danger-50">
                                    Reject
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>

        <div class="mt-6">{{ $applications->links() }}</div>
    @else
        <div class="empty-state">
            <div class="empty-state-icon">📄</div>
            <p class="font-semibold text-heading">No applications yet</p>
            <p class="text-sm text-paragraph">Applicants for this job will appear here.</p>
        </div>
    @endif

@endsection
