<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Skillora')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="min-h-screen bg-background text-heading antialiased overflow-x-hidden">

    @include('partials.frontend.navbar')

    <main>
        @if (session('success') || session('error'))
            <div class="mx-auto max-w-7xl px-4 pt-8">
                @if (session('success'))
                    <div class="alert-success mb-6">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert-error mb-6">{{ session('error') }}</div>
                @endif
            </div>
        @endif

        @yield('content')
    </main>

    @include('partials.frontend.footer')

</body>
</html>
