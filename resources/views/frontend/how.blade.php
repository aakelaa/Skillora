@extends('layouts.frontend')

@section('title', 'How It Works')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-16">
        <div class="space-y-8">
            <div class="max-w-3xl">
                <h1 class="text-4xl font-semibold text-heading">How Skillora works</h1>
                <p class="mt-4 text-lg text-paragraph">A simple, modern workflow for posting jobs, reviewing applications, and completing projects.</p>
            </div>

            <div class="grid gap-6 md:grid-cols-3">
                <div class="rounded-[32px] border border-slate-200 bg-white p-8 shadow-card">
                    <div class="inline-flex rounded-full bg-primary/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.24em] text-primary">Step 1</div>
                    <h3 class="mt-5 text-xl font-semibold text-heading">Post a job</h3>
                    <p class="mt-3 text-sm text-paragraph">Clients publish clear job descriptions, budgets, and expectations.</p>
                </div>
                <div class="rounded-[32px] border border-slate-200 bg-white p-8 shadow-card">
                    <div class="inline-flex rounded-full bg-primary/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.24em] text-primary">Step 2</div>
                    <h3 class="mt-5 text-xl font-semibold text-heading">Review candidates</h3>
                    <p class="mt-3 text-sm text-paragraph">Filter, compare, and shortlist professional applicants quickly.</p>
                </div>
                <div class="rounded-[32px] border border-slate-200 bg-white p-8 shadow-card">
                    <div class="inline-flex rounded-full bg-primary/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.24em] text-primary">Step 3</div>
                    <h3 class="mt-5 text-xl font-semibold text-heading">Hire and deliver</h3>
                    <p class="mt-3 text-sm text-paragraph">Hire the right talent, manage the project, and complete work with confidence.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
