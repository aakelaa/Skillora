@extends('layouts.frontend')

@section('title', 'FAQ')

@section('content')
    <div class="mx-auto max-w-4xl px-4 py-16 sm:px-6 lg:py-20">
        <div class="max-w-2xl">
            <span class="eyebrow">Support</span>
            <h1 class="mt-3 text-3xl font-extrabold tracking-tight text-heading sm:text-4xl">Frequently asked questions</h1>
            <p class="mt-4 text-lg text-paragraph">Answers to the most common questions about hiring, applying, and account access.</p>
        </div>

      <div class="mt-10 space-y-4" x-data="{ open: 1 }">
    <div class="card-padded card-hover">
        <button type="button" class="flex w-full items-center justify-between gap-4 text-left" @click="open = open === 1 ? null : 1">
            <h3 class="text-lg font-bold text-heading">How do I post a job?</h3>
            <span class="grid h-8 w-8 shrink-0 place-items-center rounded-full bg-primary-50 text-primary-600 transition" :class="open === 1 && 'rotate-45'">+</span>
        </button>
        <p class="mt-3 text-sm text-paragraph" x-show="open === 1" x-collapse>Register as a client, open your dashboard, and create a job posting with the role, budget, and timeline details.</p>
    </div>

    <div class="card-padded card-hover">
        <button type="button" class="flex w-full items-center justify-between gap-4 text-left" @click="open = open === 2 ? null : 2">
            <h3 class="text-lg font-bold text-heading">How do freelancers apply?</h3>
            <span class="grid h-8 w-8 shrink-0 place-items-center rounded-full bg-primary-50 text-primary-600 transition" :class="open === 2 && 'rotate-45'">+</span>
        </button>
        <p class="mt-3 text-sm text-paragraph" x-show="open === 2" x-collapse>Create a freelancer profile, browse open jobs, and submit applications with a cover letter and any required details.</p>
    </div>

    <div class="card-padded card-hover">
        <button type="button" class="flex w-full items-center justify-between gap-4 text-left" @click="open = open === 3 ? null : 3">
            <h3 class="text-lg font-bold text-heading">How long does account approval take?</h3>
            <span class="grid h-8 w-8 shrink-0 place-items-center rounded-full bg-primary-50 text-primary-600 transition" :class="open === 3 && 'rotate-45'">+</span>
        </button>
        <p class="mt-3 text-sm text-paragraph" x-show="open === 3" x-collapse>New accounts are typically reviewed within 24-48 hours. You'll receive an email notification once your account is approved.</p>
    </div>

    <div class="card-padded card-hover">
        <button type="button" class="flex w-full items-center justify-between gap-4 text-left" @click="open = open === 4 ? null : 4">
            <h3 class="text-lg font-bold text-heading">Is Skillora free to use?</h3>
            <span class="grid h-8 w-8 shrink-0 place-items-center rounded-full bg-primary-50 text-primary-600 transition" :class="open === 4 && 'rotate-45'">+</span>
        </button>
        <p class="mt-3 text-sm text-paragraph" x-show="open === 4" x-collapse>Yes — creating an account, posting jobs, and applying for work are all free on Skillora.</p>
    </div>
</div>
        </div>

        <div class="mt-10 card-padded flex flex-col items-center gap-3 text-center sm:flex-row sm:justify-between sm:text-left">
            <div>
                <p class="font-bold text-heading">Still have questions?</p>
                <p class="text-sm text-paragraph">Our team is happy to help.</p>
            </div>
            <a href="{{ url('/contact') }}" class="btn-primary shrink-0">Contact us</a>
        </div>
    </div>
@endsection
