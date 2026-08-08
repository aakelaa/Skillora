<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'WorkBridge')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-background text-heading antialiased">
    <div class="relative min-h-screen overflow-hidden">
        <div class="absolute inset-x-0 top-0 h-72 bg-gradient-to-br from-primary/15 via-white to-white"></div>
        <div class="relative mx-auto min-h-screen max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            @include('partials.navbar')

            <main class="relative mt-8">
                @if (session('success'))
                    <div class="mb-6 rounded-[28px] border border-emerald-200 bg-emerald-50 px-6 py-4 text-sm text-emerald-700 shadow-card">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-6 rounded-[28px] border border-red-200 bg-red-50 px-6 py-4 text-sm text-red-700 shadow-card">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>

            <footer class="mt-16 text-center text-sm text-muted py-8">
                &copy; {{ date('Y') }} WorkBridge. Designed for premium freelance connections.
            </footer>
        </div>
    </div>
</body>
</html>
