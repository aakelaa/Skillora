<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Skillora')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-background text-heading antialiased">
    <div class="relative min-h-screen overflow-hidden">
        <div class="absolute inset-x-0 top-0 h-80 bg-gradient-to-br from-primary/10 via-white to-white"></div>
        <div class="relative mx-auto flex min-h-screen max-w-xl flex-col justify-center px-4 py-12">
            <div class="mb-10 text-center">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-2xl font-bold text-heading">
                    <span class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-primary text-white shadow-card">S</span>
                    Skillora
                </a>
                <p class="mt-3 text-sm text-muted">A freelance hiring platform with modern features for clients and freelancers.</p>
            </div>

            <div class="form-card overflow-hidden border border-slate-200 bg-white/95 p-8 shadow-card">
                @if (session('status'))
                    <div class="mb-6 rounded-3xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm text-emerald-700">
                        {{ session('status') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
