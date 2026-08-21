@extends('layouts.dashboard')

@section('title', 'My Applications')

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">My Applications</h1>
            <p class="page-subtitle">Track your applied jobs and see status updates at a glance.</p>
        </div>
        <a href="{{ route('jobs.index') }}" class="btn-secondary">Browse more jobs</a>
    </div>

    @if ($applications->count())
        <div class="table-wrap">
            <div class="table-scroll">
                <table class="table-modern">
                    <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>Budget</th>
                            <th>Applied On</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applications as $application)
                            <tr>
                                <td class="font-semibold text-heading">
                                    <a href="{{ route('jobs.show', $application->job_id) }}" class="hover:text-primary">{{ $application->job->title }}</a>
                                </td>
                                <td class="text-paragraph">{{ $application->job->budget }}</td>
                                <td class="text-muted">{{ $application->created_at->format('M d, Y') }}</td>
                                <td>
                                    <span class="{{ $application->status === 'pending' ? 'badge-warning' : ($application->status === 'hired' ? 'badge-success' : 'badge-danger') }}">
                                        {{ ucfirst($application->status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-6">{{ $applications->links() }}</div>
    @else
        <div class="empty-state">
            <div class="empty-state-icon">📄</div>
            <p class="font-semibold text-heading">You haven't applied to any jobs yet</p>
            <p class="text-sm text-paragraph">Browse open jobs that match your skills and submit your first application.</p>
            <a href="{{ route('jobs.index') }}" class="btn-primary mt-4">Browse Jobs</a>
        </div>
    @endif

@endsection
