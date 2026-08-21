<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') · Skillora</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-background text-heading antialiased overflow-x-hidden">

    <div class="flex min-h-screen" x-data="{ sidebarOpen: false }">

        <!-- Mobile overlay -->
        <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 z-40 bg-heading/40 lg:hidden" @click="sidebarOpen = false" style="display:none;"></div>

        <!-- Sidebar -->
        <div class="fixed inset-y-0 left-0 z-50 w-72 transform transition-transform duration-200 lg:static lg:translate-x-0"
             :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
            @include('partials.sidebar')
        </div>

        <div class="flex-1 flex flex-col min-w-0">

            <header class="sticky top-0 z-30 border-b border-border bg-white/95 backdrop-blur-lg px-4 py-4 sm:px-6">
                <div class="mx-auto flex items-center justify-between gap-4 max-w-7xl">
                    <div class="flex items-center gap-3">
                        <button class="grid h-10 w-10 place-items-center rounded-xl border border-border text-paragraph lg:hidden" @click="sidebarOpen = true">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                        <div>
                            <h1 class="text-lg font-bold text-heading leading-tight">@yield('title', 'Dashboard')</h1>
                            <p class="hidden text-xs text-muted sm:block">Manage your workspace and stay on top of your account.</p>
                        </div>
                    </div>

                    <div class="inline-flex items-center gap-3 rounded-full border border-border bg-white px-3 py-1.5 text-sm shadow-xs">
                        <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-primary-50 text-primary-600 font-semibold">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                        <div class="hidden leading-tight text-left sm:block">
                            <div class="font-semibold text-heading">{{ auth()->user()->name }}</div>
                            <div class="text-xs text-muted capitalize">{{ auth()->user()->role }}</div>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 py-8">
                <div class="mx-auto w-full max-w-7xl px-4 sm:px-6">
                    @if (session('success'))
                        <div class="alert-success mb-6">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                        <div class="alert-error mb-6">{{ session('error') }}</div>
                    @endif

                    @yield('content')
                </div>
            </main>
        </div>
    </div>

</body>
</html>
