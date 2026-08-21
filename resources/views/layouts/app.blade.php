<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Skillora')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-background text-heading antialiased overflow-x-hidden">

    <div class="min-h-screen">
        @include('partials.navbar')

        @isset($header)
            <header class="border-b border-border bg-white">
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="alert-success mb-6">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert-error mb-6">{{ session('error') }}</div>
            @endif

            @yield('content')
            {{ $slot ?? '' }}
        </main>

        <footer class="border-t border-border py-8 text-center text-sm text-muted">
            &copy; {{ date('Y') }} Skillora. Designed for premium freelance connections.
        </footer>
    </div>

</body>
</html>
