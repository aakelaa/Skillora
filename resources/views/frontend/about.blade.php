@extends('layouts.frontend')

@section('title', 'About Us')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-16">
        <div class="grid gap-10 lg:grid-cols-[1.1fr_0.9fr] lg:items-center">
            <div class="space-y-6">
                <span class="inline-flex rounded-full bg-primary/10 px-4 py-2 text-sm font-semibold text-primary">About Skillora</span>
                <h1 class="text-3xl font-semibold text-heading">A trusted platform where clients and freelancers connect with clarity and confidence.</h1>
                <p class="max-w-1xl text-lg text-paragraph">We bring together vetted professionals and ambitious projects in a polished experience that makes hiring easy, transparent, and efficient.</p>

                <div class="grid gap-6 sm:grid-cols-2">
                    <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-card">
                        <h3 class="font-semibold text-heading">Our Mission</h3>
                        <p class="mt-3 text-sm text-paragraph">Empower freelancers and help clients scale with trusted talent.</p>
                    </div>
                    <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-card">
                        <h3 class="font-semibold text-heading">Our Vision</h3>
                        <p class="mt-3 text-sm text-paragraph">Create a modern freelance marketplace built for premium teams.</p>
                    </div>
                </div>
            </div>
            <div class="rounded-[32px] border border-slate-200 bg-white p-8 shadow-card">
                <h2 class="text-2xl font-semibold text-heading">Core values</h2>
                <div class="mt-6 space-y-4 text-sm text-paragraph">
                    <p><strong>Quality</strong> — We promote meaningful work and strong professional matches.</p>
                    <p><strong>Trust</strong> — Every step is built for clear communication and secure hiring.</p>
                    <p><strong>Simplicity</strong> — Fast workflows for posting jobs, reviewing applications, and hiring.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
