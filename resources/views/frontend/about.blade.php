@extends('layouts.frontend')

@section('title', 'About Us')

@section('content')
    <div class="bg-white">
        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:py-20">
            <div class="grid gap-12 lg:grid-cols-[1.1fr_0.9fr] lg:items-center">
                <div class="space-y-6">
                    <span class="eyebrow">About Skillora</span>
                    <h1 class="text-3xl font-extrabold leading-tight tracking-tight text-heading sm:text-4xl">A trusted platform where clients and freelancers connect with clarity and confidence.</h1>
                    <p class="max-w-xl text-lg text-paragraph">We bring together vetted professionals and ambitious projects in a polished experience that makes hiring easy, transparent, and efficient.</p>

                    <div class="grid gap-5 sm:grid-cols-2">
    <div class="card-padded card-hover">
        <h3 class="font-bold text-heading">Our Mission</h3>
        <p class="mt-2 text-sm text-paragraph">Empower freelancers and help clients scale with trusted talent.</p>
    </div>
    <div class="card-padded card-hover">
        <h3 class="font-bold text-heading">Our Vision</h3>
        <p class="mt-2 text-sm text-paragraph">Create a modern freelance marketplace built for premium teams.</p>
    </div>
</div>
                </div>

                <div class="card-padded">
                    <h2 class="text-2xl font-bold text-heading">Core values</h2>
                    <div class="mt-6 space-y-5">
                        <div class="flex gap-4">
                            <span class="grid h-9 w-9 shrink-0 place-items-center rounded-lg bg-primary-50 text-primary-600 font-bold">Q</span>
                            <p class="text-sm text-paragraph"><strong class="text-heading">Quality</strong> — We promote meaningful work and strong professional matches.</p>
                        </div>
                        <div class="flex gap-4">
                            <span class="grid h-9 w-9 shrink-0 place-items-center rounded-lg bg-success-50 text-success-600 font-bold">T</span>
                            <p class="text-sm text-paragraph"><strong class="text-heading">Trust</strong> — Every step is built for clear communication and secure hiring.</p>
                        </div>
                        <div class="flex gap-4">
                            <span class="grid h-9 w-9 shrink-0 place-items-center rounded-lg bg-warning-50 text-warning-600 font-bold">S</span>
                            <p class="text-sm text-paragraph"><strong class="text-heading">Simplicity</strong> — Fast workflows for posting jobs, reviewing applications, and hiring.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.frontend.stats')
    @include('partials.frontend.cta')
@endsection
