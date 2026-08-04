@extends('layouts.app')

@section('title', $job->title)

@section('content')
    <div class="bg-white p-6 rounded shadow-sm border">
        <h1 class="text-2xl font-bold">{{ $job->title }}</h1>
        <p class="text-sm text-gray-500 mb-4">
            Posted by {{ $job->client->name }}
            @if ($job->category) &middot; {{ $job->category->name }} @endif
            &middot; {{ $job->deadline_countdown }}
        </p>

        <p class="text-green-700 font-semibold mb-4">{{ $job->budget_formatted }}</p>

        <p class="text-gray-700 whitespace-pre-line">{{ $job->description }}</p>

        @if ($job->attachment_path)
            <a href="{{ Storage::url($job->attachment_path) }}" target="_blank"
               class="inline-block mt-4 text-indigo-600 hover:underline text-sm">
                📎 Download attachment
            </a>
        @endif
    </div>

    {{-- Apply to Job form (freelancers only) --}}
    @auth
        @if (auth()->user()->isFreelancer())
            <div class="bg-white p-6 rounded shadow-sm border mt-6">
                <h2 class="font-semibold mb-3">Apply to this job</h2>

                <form method="POST" action="{{ route('jobs.apply', $job) }}">
                    @csrf

                    <textarea name="cover_letter" rows="5" placeholder="Write your cover letter..."
                        class="w-full border rounded p-2 text-sm">{{ old('cover_letter') }}</textarea>
                    @error('cover_letter')
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                    @enderror

                    <button type="submit" class="mt-3 bg-indigo-600 text-white px-4 py-2 rounded text-sm">
                        Submit Application
                    </button>
                </form>
            </div>
        @endif
    @else
        <p class="mt-6 text-sm text-gray-500">
            <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Log in</a> as a freelancer to apply.
        </p>
    @endauth
@endsection
