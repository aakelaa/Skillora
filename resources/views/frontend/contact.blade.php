@extends('layouts.frontend')

@section('title', 'Contact Us')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-16">
        <div class="grid gap-10 lg:grid-cols-2 lg:items-start">
            <div class="space-y-6">
                <h1 class="text-4xl font-semibold text-heading">Contact Skillora</h1>
                <p class="text-lg text-paragraph">Need help with your account, posting a job, or exploring freelance opportunities? Send us a message and we’ll respond promptly.</p>
                <div class="rounded-[32px] border border-slate-200 bg-white p-8 shadow-card">
                    <h2 class="text-xl font-semibold text-heading">Company information</h2>
                    <p class="mt-4 text-sm text-paragraph">Email: <a href="mailto:aaqiladawood@gmail.com" class="text-primary hover:text-primary/80">aaqiladawood@gmail.com</a></p>
                    <p class="mt-2 text-sm text-paragraph">Phone: <span class="font-medium">+92 329 4068456</span></p>
                </div>
            </div>

            <div class="rounded-[32px] border border-slate-200 bg-white p-8 shadow-card">
                <h2 class="text-2xl font-semibold text-heading">Send us a message</h2>
                <form action="{{ url('/contact') }}" method="POST" class="mt-6 space-y-6">
                    @csrf
                    <div>
                        <x-input-label for="name" value="Name" />
                        <x-text-input id="name" name="name" type="text" placeholder="Your name" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="email" value="Email" />
                        <x-text-input id="email" name="email" type="email" placeholder="Your email" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="message" value="Message" />
                        <textarea id="message" name="message" rows="5" class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10"></textarea>
                    </div>
                    <button type="submit" class="btn-primary w-full py-3">Send Message</button>
                </form>
            </div>
        </div>
    </div>
@endsection
