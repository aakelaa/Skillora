@extends('layouts.frontend')

@section('title', 'Contact Us')

@section('content')
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:py-20">
        <div class="mb-12 max-w-2xl">
            <span class="eyebrow">Get in touch</span>
            <h1 class="mt-3 text-3xl font-extrabold tracking-tight text-heading sm:text-4xl">Contact Skillora</h1>
            <p class="mt-4 text-lg text-paragraph">Need help with your account, posting a job, or exploring freelance opportunities? Send us a message and we'll respond promptly.</p>
        </div>

        <div class="grid gap-8 lg:grid-cols-[0.85fr_1.15fr] lg:items-start">
            <div class="space-y-6">
                <div class="card-padded space-y-5">
                    <h2 class="text-lg font-bold text-heading">Company information</h2>

                    <div class="flex items-start gap-4">

                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-muted">Email</p>
                            <a href="mailto:aaqiladawood@gmail.com" class="text-sm font-semibold text-primary hover:text-primary-700">aaqiladawood@gmail.com</a>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">

                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-muted">Phone</p>
                            <p class="text-sm font-semibold text-heading">+92 329 4068456</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-padded">
                <h2 class="text-xl font-bold text-heading">Send us a message</h2>
                <form action="{{ url('/contact') }}" method="POST" class="mt-6 space-y-5">
                    @csrf
                    <div class="grid gap-5 sm:grid-cols-2">
                        <div class="field-group">
                            <x-input-label for="name" value="Name" />
                            <x-text-input id="name" name="name" type="text" placeholder="Your name" class="mt-1" />
                        </div>
                        <div class="field-group">
                            <x-input-label for="email" value="Email" />
                            <x-text-input id="email" name="email" type="email" placeholder="Your email" class="mt-1" />
                        </div>
                    </div>
                    <div class="field-group">
                        <x-input-label for="message" value="Message" />
                        <textarea id="message" name="message" rows="5" class="mt-1" placeholder="How can we help?"></textarea>
                    </div>
                    <button type="submit" class="btn-primary w-full">Send Message</button>
                </form>
            </div>
        </div>
    </div>
@endsection
