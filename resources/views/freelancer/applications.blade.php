@extends('layouts.dashboard')

@section('title', 'My Applications')

@section('content')

    <div class="bg-white rounded-xl border overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-500 text-left">
                <tr>
                    <th class="px-5 py-3 font-medium">Job Title</th>
                    <th class="px-5 py-3 font-medium">Budget</th>
                    <th class="px-5 py-3 font-medium">Applied On</th>
                    <th class="px-5 py-3 font-medium">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($applications as $application)
                    <tr>
                        <td class="px-5 py-3 font-medium text-gray-900">
                            <a href="{{ route('jobs.show', $application->job_id) }}" class="hover:underline">
                                {{ $application->job->title }}
                            </a>
                        </td>
                        <td class="px-5 py-3 text-gray-600">{{ $application->job->budget_formatted }}</td>
                        <td class="px-5 py-3 text-gray-500">{{ $application->created_at->format('M d, Y') }}</td>
                        <td class="px-5 py-3">
                            <span class="text-xs px-2 py-1 rounded-full
                                {{ $application->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                {{ $application->status === 'hired' ? 'bg-green-100 text-green-700' : '' }}
                                {{ $application->status === 'rejected' ? 'bg-red-100 text-red-700' : '' }}">
                                {{ ucfirst($application->status) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-5 py-6 text-center text-gray-500">You haven't applied to any jobs yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $applications->links() }}</div>

@endsection
