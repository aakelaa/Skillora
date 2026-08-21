@extends('layouts.frontend')

@section('title', 'How It Works')

@section('content')
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:py-20">
        <div class="max-w-2xl">
            <span class="eyebrow">Simple process</span>
            <h1 class="mt-3 text-3xl font-extrabold tracking-tight text-heading sm:text-4xl">How Skillora works</h1>
            <p class="mt-4 text-lg text-paragraph">A simple, modern workflow for posting jobs, reviewing applications, and completing projects.</p>
        </div>

        <div class="relative mt-14 grid gap-8 md:grid-cols-3">
            <div class="hidden md:block absolute left-0 right-0 top-6 h-px bg-border" style="margin: 0 16.6%;"></div>

            <div class="relative card-padded">
                <div class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-primary text-lg font-bold text-white shadow-soft">1</div>
                <h3 class="text-xl font-bold text-heading">Post a job</h3>
                <p class="mt-3 text-sm text-paragraph">Clients publish clear job descriptions, budgets, and expectations.</p>
            </div>
            <div class="relative card-padded">
                <div class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-primary text-lg font-bold text-white shadow-soft">2</div>
                <h3 class="text-xl font-bold text-heading">Review candidates</h3>
                <p class="mt-3 text-sm text-paragraph">Filter, compare, and shortlist professional applicants quickly.</p>
            </div>
            <div class="relative card-padded">
                <div class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-primary text-lg font-bold text-white shadow-soft">3</div>
                <h3 class="text-xl font-bold text-heading">Hire and deliver</h3>
                <p class="mt-3 text-sm text-paragraph">Hire the right talent, manage the project, and complete work with confidence.</p>
            </div>
        </div>
    </div>

    @include('partials.frontend.cta')
@endsection
