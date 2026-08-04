@extends('layouts.dashboard')

@section('title', 'Client Dashboard')

@section('content')

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Welcome, {{ auth()->user()->name }}!</h2>
        <a href="{{ route('clients.jobs.create') }}"
           class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2.5 rounded-lg text-sm font-medium flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Post a New Job
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="bg-white p-5 rounded-xl border flex items-center gap-4">
            <div class="w-11 h-11 rounded-lg bg-blue-100 flex items-center justify-center shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>
            </div>
            <div>
                <p class="text-xs text-gray-500">Active Job Posts</p>
                <p class="text-xl font-bold">{{ $stats['active_jobs'] }}</p>
            </div>
        </div>

        <div class="bg-white p-5 rounded-xl border flex items-center gap-4">
            <div class="w-11 h-11 rounded-lg bg-sky-100 flex items-center justify-center shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </div>
            <div>
                <p class="text-xs text-gray-500">Total Applications Received</p>
                <p class="text-xl font-bold">{{ $stats['applications_received'] }}</p>
            </div>
        </div>

        <div class="bg-white p-5 rounded-xl border flex items-center gap-4">
            <div class="w-11 h-11 rounded-lg bg-orange-100 flex items-center justify-center shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>
            </div>
            <div>
                <p class="text-xs text-gray-500">Hired Freelancers</p>
                <p class="text-xl font-bold">{{ $stats['hired_count'] }}</p>
            </div>
        </div>
    </div>

    <h3 class="font-bold text-lg mb-3">Manage Your Job Postings</h3>

    <div class="bg-white rounded-xl border overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-500 text-left">
                <tr>
                    <th class="px-5 py-3 font-medium">Job Title</th>
                    <th class="px-5 py-3 font-medium">Applications</th>
                    <th class="px-5 py-3 font-medium">Status</th>
                    <th class="px-5 py-3 font-medium">Date Posted</th>
                    <th class="px-5 py-3 font-medium">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($jobs as $job)
                    <tr>
                        <td class="px-5 py-3 font-medium text-gray-900">{{ $job->title }}</td>
                        <td class="px-5 py-3 text-gray-600">{{ $job->applications_count }}</td>
                        <td class="px-5 py-3">
                            <span class="text-xs px-2 py-1 rounded-full
                                {{ $job->status === 'open' ? 'bg-green-100 text-green-700' : '' }}
                                {{ $job->status === 'hired' ? 'bg-blue-100 text-blue-700' : '' }}
                                {{ $job->status === 'closed' ? 'bg-gray-100 text-gray-600' : '' }}">
                                {{ ucfirst($job->status) }}
                            </span>
                        </td>
                        <td class="px-5 py-3 text-gray-500">{{ $job->created_at->format('M d, Y') }}</td>
                        <td class="px-5 py-3">
                            <a href="{{ route('clients.jobs.applications', $job) }}" class="text-indigo-600 hover:underline">Applicants</a>
                            <span class="text-gray-300">/</span>
                            <a href="{{ route('clients.jobs.edit', $job) }}" class="text-indigo-600 hover:underline">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-5 py-6 text-center text-gray-500">You haven't posted any jobs yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4 text-right">
        <a href="{{ route('clients.jobs.index') }}" class="text-sm text-indigo-600 hover:underline">View all my jobs &rarr;</a>
    </div>

@endsection
