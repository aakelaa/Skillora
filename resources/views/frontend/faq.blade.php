@extends('layouts.frontend')

@section('title', 'FAQ')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-16">
        <div class="max-w-3xl">
            <h1 class="text-4xl font-semibold text-heading">Frequently asked questions</h1>
            <p class="mt-4 text-lg text-paragraph">Answers to the most common questions about hiring, applying, and account access.</p>
        </div>

        <div class="mt-10 space-y-6">
            <div class="rounded-[32px] border border-slate-200 bg-white p-8 shadow-card">
                <h3 class="text-xl font-semibold text-heading">How do I post a job?</h3>
                <p class="mt-3 text-sm text-paragraph">Register as a client, open your dashboard, and create a job posting with the role, budget, and timeline details.</p>
            </div>
            <div class="rounded-[32px] border border-slate-200 bg-white p-8 shadow-card">
                <h3 class="text-xl font-semibold text-heading">How do freelancers apply?</h3>
                <p class="mt-3 text-sm text-paragraph">Create a freelancer profile, browse open jobs, and submit applications with a cover letter and any required details.</p>
            </div>
        </div>
    </div>
@endsection
