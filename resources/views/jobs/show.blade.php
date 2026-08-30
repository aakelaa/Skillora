@extends('layouts.frontend')

@section('title', $job->title)

@section('content')
    <div class="mx-auto max-w-4xl px-4 py-16 sm:px-6 lg:py-20 space-y-6">
        <a href="{{ route('jobs.index') }}" class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary hover:text-primary-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" /></svg>
            Back to Jobs
        </a>

        <div class="card-padded">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
                <div>
                    @if ($job->category)
                        <span class="eyebrow">{{ $job->category->name }}</span>
                    @endif
                    <h1 class="mt-3 text-2xl font-extrabold tracking-tight text-heading sm:text-3xl">{{ $job->title }}</h1>
                    <p class="mt-3 text-sm text-muted">Posted by <span class="font-semibold text-heading">{{ $job->client->name }}</span> · {{ $job->deadline_countdown }}</p>
                </div>
                <div class="shrink-0 rounded-xl bg-primary-50 px-5 py-3 text-right">
                    <p class="text-xs font-semibold uppercase tracking-wider text-primary-600">Budget</p>
                    <p class="text-lg font-extrabold text-primary-700">{{ $job->budget_formatted }}</p>
                </div>
            </div>

            <div class="mt-8 border-t border-border pt-6 text-sm leading-7 text-paragraph whitespace-pre-line">{{ $job->description }}</div>

            @if ($job->attachment_path)
                <a href="{{ Storage::url($job->attachment_path) }}" target="_blank" class="btn-secondary mt-6 inline-flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" /></svg>
                    Download attachment
                </a>
            @endif
        </div>

        @auth
            @if (auth()->user()->isFreelancer())
                <div class="card-padded">
                    <h2 class="text-xl font-bold text-heading">Apply to this job</h2>
                    <p class="mt-2 text-sm text-paragraph">Share your cover letter and explain why you're the best candidate.</p>
                    <form method="POST" action="{{ route('jobs.apply', $job) }}" class="mt-6 space-y-4">
                        @csrf
                        <div>
                            <textarea name="cover_letter" rows="6" placeholder="Write your cover letter...">{{ old('cover_letter') }}</textarea>
                            @error('cover_letter')
                                <p class="mt-2 text-sm text-danger-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn-primary">Submit Application</button>
                    </form>
                </div>
            @endif
        @else
            <div class="card-padded flex items-center gap-4">

                <p class="text-sm text-paragraph">Want to apply? <a href="{{ route('login') }}" class="font-semibold text-primary hover:text-primary-700">Log in</a> as a freelancer to submit your application.</p>
            </div>
        @endauth
    </div>
@endsection
