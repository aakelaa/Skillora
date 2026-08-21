<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Skillora')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-background text-heading antialiased overflow-x-hidden">
    <div class="grid min-h-screen grid-cols-1 lg:grid-cols-2">

        <!-- Brand panel (desktop only) -->
        <div class="relative hidden overflow-hidden bg-primary-700 lg:flex lg:flex-col lg:justify-between lg:p-12">
            <div class="absolute inset-0 bg-gradient-to-br from-primary-700 via-primary-600 to-secondary-600 opacity-95"></div>
            <div class="absolute -right-24 -top-24 h-96 w-96 rounded-full bg-white/10 blur-3xl"></div>
            <div class="absolute -bottom-32 -left-16 h-96 w-96 rounded-full bg-white/10 blur-3xl"></div>

            <a href="{{ route('home') }}" class="relative z-10 inline-flex items-center gap-2 text-2xl font-bold text-white">
                <span class="inline-flex h-11 w-11 items-center justify-center rounded-xl bg-white/15 text-white backdrop-blur">S</span>
                Skillora
            </a>

            <div class="relative z-10 max-w-md space-y-4 text-white">
                <h2 class="text-3xl font-bold leading-tight">Where great teams meet great talent.</h2>
                <p class="text-white/80">Post jobs, review proposals, and hire skilled freelancers — all in one polished, secure workspace.</p>
            </div>

            <p class="relative z-10 text-sm text-white/60">&copy; {{ date('Y') }} Skillora. All rights reserved.</p>
        </div>

        <!-- Form panel (always visible, full width on mobile/tablet) -->
        <div class="flex w-full flex-col justify-center lg:px-16">

            <!-- Mobile/tablet banner (Option A) — only shows below lg, since the full brand panel above already covers lg+ -->
            <div class="relative overflow-hidden bg-primary-700 px-6 py-6 lg:hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-primary-700 via-primary-600 to-secondary-600 opacity-95"></div>
                <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-white/10 blur-2xl"></div>

                <a href="{{ route('home') }}" class="relative z-10 inline-flex items-center gap-2 text-lg font-bold text-white">
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-white/15 text-white backdrop-blur">S</span>
                    Skillora
                </a>
                <p class="relative z-10 mt-2 text-sm font-medium text-white/90">Where great teams meet great talent.</p>
            </div>

            <div class="mx-auto w-full max-w-md px-6 py-10 sm:px-12">
                @if (session('status'))
                    <div class="alert-success mb-6">{{ session('status') }}</div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
