<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - WorkBridge</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-background text-heading antialiased">

    <div class="flex min-h-screen">

        @include('partials.sidebar')

        <div class="flex-1 flex flex-col min-w-0">

            <header class="sticky top-0 z-30 border-b border-slate-200 bg-white/95 backdrop-blur-lg px-6 py-4 shadow-sm">
                <div class="mx-auto flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between max-w-7xl">
                    <div>
                        <h1 class="text-xl font-semibold text-heading">@yield('title', 'Dashboard')</h1>
                        <p class="text-sm text-muted">Manage your workspace, review activity, and stay on top of your account.</p>
                    </div>
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                        <div class="inline-flex items-center gap-3 rounded-full border border-slate-200 bg-surface px-4 py-2 text-sm text-slate-700 shadow-sm">
                            <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-primary/10 text-primary font-semibold">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                            <div class="leading-tight text-left">
                                <div class="font-semibold">{{ auth()->user()->name }}</div>
                                <div class="text-xs text-muted capitalize">{{ auth()->user()->role }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 bg-background py-8">
                <div class="mx-auto w-full max-w-7xl px-6">
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
        </div>
    </div>

</body>
</html>
