<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FreelanceHub')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="min-h-screen bg-background text-heading antialiased">

    @include('partials.frontend.navbar')

    <main class="py-10">
        <div class="mx-auto max-w-7xl px-4">
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
        </div>
    </main>

    @include('partials.frontend.footer')

</body>
</html>
