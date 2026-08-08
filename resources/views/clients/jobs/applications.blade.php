@extends('layouts.dashboard')

@section('title', 'Applicants')

@section('content')

    <div class="mb-8 rounded-[32px] border border-slate-200 bg-white p-8 shadow-card">
        <a href="{{ route('clients.jobs.index') }}" class="text-sm font-semibold text-primary hover:text-primary/80">&larr; Back to My Jobs</a>
        <div class="mt-4">
            <h2 class="text-2xl font-semibold text-heading">{{ $job->title }}</h2>
            <p class="mt-2 text-sm text-muted">Status: {{ ucfirst($job->status) }}</p>
        </div>
    </div>

    <div class="grid gap-4">
        @forelse ($applications as $application)
            <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-card">
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <p class="text-lg font-semibold text-heading">{{ $application->freelancer->name }}</p>
                        <p class="mt-1 text-sm text-muted">{{ $application->freelancer->email }}</p>
                    </div>
                    <span class="inline-flex rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700 {{ $application->status === 'hired' ? 'bg-green-100 text-green-700' : ($application->status === 'rejected' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }}">
                        {{ ucfirst($application->status) }}
                    </span>
                </div>

                <p class="mt-4 text-sm leading-7 text-paragraph">{{ $application->cover_letter }}</p>

                @if ($application->status === 'pending')
                    <div class="mt-5 flex flex-col gap-3 sm:flex-row">
                        <form method="POST" action="{{ route('clients.applications.hire', $application) }}" class="w-full sm:w-auto">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn-primary w-full px-5 py-3 text-sm" onclick="return confirm('Hire this freelancer? This will close the job.');">
                                Hire
                            </button>
                        </form>
                        <form method="POST" action="{{ route('clients.applications.reject', $application) }}" class="w-full sm:w-auto">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="rounded-3xl border border-red-200 bg-red-50 px-5 py-3 text-sm font-semibold text-red-700 hover:bg-red-100">
                                Reject
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        @empty
            <div class="rounded-[28px] border border-slate-200 bg-white p-8 shadow-card text-center text-paragraph">No applications yet for this job.</div>
        @endforelse
    </div>

@endsection
