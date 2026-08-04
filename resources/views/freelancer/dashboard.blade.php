@extends('layouts.dashboard')

@section('title', 'Freelancer Dashboard')

@section('content')

    <h2 class="text-2xl font-bold text-gray-900 mb-6">Welcome Back, {{ auth()->user()->name }}!</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="bg-white p-5 rounded-xl border flex items-center gap-4">
            <div class="w-11 h-11 rounded-lg bg-blue-100 flex items-center justify-center shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>
            </div>
            <div>
                <p class="text-xs text-gray-500">Active Applications</p>
                <p class="text-xl font-bold">{{ $stats['active_applications'] }}</p>
            </div>
        </div>

        <div class="bg-white p-5 rounded-xl border flex items-center gap-4">
            <div class="w-11 h-11 rounded-lg bg-green-100 flex items-center justify-center shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </div>
            <div>
                <p class="text-xs text-gray-500">Hired</p>
                <p class="text-xl font-bold">{{ $stats['hired'] }}</p>
            </div>
        </div>

        <div class="bg-white p-5 rounded-xl border flex items-center gap-4">
            <div class="w-11 h-11 rounded-lg bg-orange-100 flex items-center justify-center shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>
            </div>
            <div>
                <p class="text-xs text-gray-500">New Job Matches</p>
                <p class="text-xl font-bold">{{ $stats['new_matches'] }}</p>
            </div>
        </div>
    </div>

    <div class="flex justify-between items-center mb-4">
        <h3 class="font-bold text-lg">Recommended Jobs</h3>
        <a href="{{ route('jobs.index') }}" class="text-sm text-indigo-600 hover:underline">Browse all &rarr;</a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-10">
        @forelse ($recommendedJobs as $job)
            <div class="bg-white rounded-lg shadow-sm border overflow-hidden hover:shadow-md transition">


                <div class="p-4">
                    <h4 class="font-bold text-gray-900">{{ $job->title }}</h4>
                    <p class="text-sm text-gray-500 mt-1">{{ $job->category->name ?? 'General' }} &middot; {{ $job->client->name }}</p>

                    <div class="flex justify-between items-center mt-4">
                        <span class="text-sm text-gray-700">Budget: <strong>{{ $job->budget_formatted }}</strong></span>
                        <a href="{{ route('jobs.show', $job) }}"
                           class="bg-indigo-600 text-white text-sm px-4 py-1.5 rounded hover:bg-indigo-700">
                            Apply Now
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-gray-500 col-span-full">No new job matches right now — check back soon!</p>
        @endforelse
    </div>

    <div class="flex justify-between items-center mb-3">
        <h3 class="font-bold text-lg">My Recent Applications</h3>
        <a href="{{ route('freelancer.applications') }}" class="text-sm text-indigo-600 hover:underline">View all &rarr;</a>
    </div>

    <div class="bg-white rounded-xl border overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-500 text-left">
                <tr>
                    <th class="px-5 py-3 font-medium">Job Title</th>
                    <th class="px-5 py-3 font-medium">Applied On</th>
                    <th class="px-5 py-3 font-medium">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($recentApplications as $application)
                    <tr>
                        <td class="px-5 py-3 font-medium text-gray-900">
                            <a href="{{ route('jobs.show', $application->job_id) }}" class="hover:underline">
                                {{ $application->job->title }}
                            </a>
                        </td>
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
                    <tr><td colspan="3" class="px-5 py-6 text-center text-gray-500">You haven't applied to any jobs yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
