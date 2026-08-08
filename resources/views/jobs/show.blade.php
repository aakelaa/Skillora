@extends('layouts.frontend')

@section('title', $job->title)

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-16 space-y-8">
        <div class="rounded-[32px] border border-slate-200 bg-white p-8 shadow-card">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
                <div>
                    <h1 class="text-3xl font-semibold text-heading">{{ $job->title }}</h1>
                    <p class="mt-3 text-sm text-muted">Posted by {{ $job->client->name }} @if ($job->category) · {{ $job->category->name }} @endif · {{ $job->deadline_countdown }}</p>
                </div>
                <div class="rounded-3xl bg-primary/10 px-4 py-3 text-right text-sm font-semibold text-primary">
                    {{ $job->budget_formatted }}</div>
            </div>

            <div class="mt-8 text-sm leading-7 text-paragraph whitespace-pre-line">{{ $job->description }}</div>

            @if ($job->attachment_path)
                <a href="{{ Storage::url($job->attachment_path) }}" target="_blank" class="inline-flex items-center gap-2 mt-6 rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-semibold text-primary hover:bg-slate-100">📎 Download attachment</a>
            @endif
        </div>

        @auth
            @if (auth()->user()->isFreelancer())
                <div class="rounded-[32px] border border-slate-200 bg-white p-8 shadow-card">
                    <h2 class="text-2xl font-semibold text-heading">Apply to this job</h2>
                    <p class="mt-3 text-sm text-paragraph">Share your cover letter and explain why you’re the best candidate.</p>
                    <form method="POST" action="{{ route('jobs.apply', $job) }}" class="mt-6 space-y-4">
                        @csrf
                        <div>
                            <textarea name="cover_letter" rows="6" placeholder="Write your cover letter..." class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-4 text-sm text-slate-900 focus:border-primary focus:ring-primary/10">{{ old('cover_letter') }}</textarea>
                            @error('cover_letter')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn-primary px-6 py-3 text-sm">Submit Application</button>
                    </form>
                </div>
            @endif
        @else
            <div class="rounded-[32px] border border-slate-200 bg-white p-6 shadow-card">
                <p class="text-sm text-paragraph">Want to apply? <a href="{{ route('login') }}" class="font-semibold text-primary hover:text-primary/80">Log in</a> as a freelancer to submit your application.</p>
            </div>
        @endauth
    </div>
@endsection
