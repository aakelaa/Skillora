@extends('layouts.frontend')

@section('title', 'Services')

@section('content')
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:py-20">
        <div class="max-w-2xl">
            <span class="eyebrow">What we offer</span>
            <h1 class="mt-3 text-3xl font-extrabold tracking-tight text-heading sm:text-4xl">Services designed for both clients and freelancers.</h1>
            <p class="mt-4 text-lg text-paragraph">Whether you're hiring talent or seeking your next project, Skillora provides modern tools for every stage of the process.</p>
        </div>

    <div class="mt-12 grid gap-6 lg:grid-cols-2">
    <div class="card-padded card-hover">
        <div class="mb-6 flex items-center gap-3">
            <h3 class="text-2xl font-bold text-heading">For Clients</h3>
        </div>
        <ol class="space-y-4">
            <li class="flex items-center gap-4 rounded-xl bg-background p-4">
                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-primary text-sm font-bold text-white">1</span>
                <span class="text-sm text-paragraph">Post jobs with clear requirements and budgets.</span>
            </li>
            <li class="flex items-center gap-4 rounded-xl bg-background p-4">
                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-primary text-sm font-bold text-white">2</span>
                <span class="text-sm text-paragraph">Review proposals and shortlist applicants with ease.</span>
            </li>
            <li class="flex items-center gap-4 rounded-xl bg-background p-4">
                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-primary text-sm font-bold text-white">3</span>
                <span class="text-sm text-paragraph">Manage project milestones and freelancer relationships.</span>
            </li>
        </ol>
        <a href="{{ route('register') }}" class="btn-primary mt-6 w-full">Post a job</a>
    </div>

    <div class="card-padded card-hover">
        <div class="mb-6 flex items-center gap-3">
            <h3 class="text-2xl font-bold text-heading">For Freelancers</h3>
        </div>
        <ol class="space-y-4">
            <li class="flex items-center gap-4 rounded-xl bg-background p-4">
                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-secondary text-sm font-bold text-white">1</span>
                <span class="text-sm text-paragraph">Discover vetted freelance opportunities that match your skills.</span>
            </li>
            <li class="flex items-center gap-4 rounded-xl bg-background p-4">
                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-secondary text-sm font-bold text-white">2</span>
                <span class="text-sm text-paragraph">Submit proposals, manage applications, and communicate clearly.</span>
            </li>
            <li class="flex items-center gap-4 rounded-xl bg-background p-4">
                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-secondary text-sm font-bold text-white">3</span>
                <span class="text-sm text-paragraph">Build a strong profile that stands out to clients.</span>
            </li>
        </ol>
        <a href="{{ route('jobs.index') }}" class="btn-secondary mt-6 w-full">Browse jobs</a>
    </div>
</div>
    </div>

    @include('partials.frontend.cta')
@endsection
