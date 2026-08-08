@extends('layouts.frontend')

@section('title', 'Services')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-16">
        <div class="space-y-8">
            <div class="max-w-3xl">
                <h1 class="text-3xl font-semibold text-heading">Services designed for both clients and freelancers.</h1>
                <p class="mt-4 text-m text-paragraph">Whether you’re hiring talent or seeking your next project, Skillora provides <br> modern tools for every stage of the process.</p>
            </div>

            <div class="grid gap-6 lg:grid-cols-2">
                <div class="rounded-[32px] border border-slate-200 bg-white p-8 shadow-card">
                    <h3 class="text-2xl font-semibold text-heading">For Clients</h3>
                    <ol class="mt-6 space-y-4 text-paragraph text-sm">
                        <li class="flex items-center gap-4 rounded-3xl bg-slate-50 p-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-primary text-white font-semibold">1</span>
                            <span>Post jobs with clear requirements and budgets.</span>
                        </li>
                        <li class="flex items-center gap-4 rounded-3xl bg-slate-50 p-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-primary text-white font-semibold">2</span>
                            <span>Review proposals and shortlist applicants with ease.</span>
                        </li>
                        <li class="flex items-center gap-4 rounded-3xl bg-slate-50 p-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-primary text-white font-semibold">3</span>
                            <span>Manage project milestones and freelancer relationships.</span>
                        </li>
                    </ol>
                </div>
                <div class="rounded-[32px] border border-slate-200 bg-white p-8 shadow-card">
                    <h3 class="text-2xl font-semibold text-heading">For Freelancers</h3>
                    <ol class="mt-6 space-y-4 text-paragraph text-sm">
                        <li class="flex items-center gap-4 rounded-3xl bg-slate-50 p-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-primary text-white font-semibold">1</span>
                            <span>Discover vetted freelance opportunities that match your skills.</span>
                        </li>
                        <li class="flex items-center gap-4 rounded-3xl bg-slate-50 p-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-primary text-white font-semibold">2</span>
                            <span>Submit proposals, manage applications, and communicate clearly.</span>
                        </li>
                        <li class="flex items-center gap-4 rounded-3xl bg-slate-50 p-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-primary text-white font-semibold">3</span>
                            <span>Build a strong profile that stands out to clients.</span>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
