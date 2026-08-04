<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - WorkBridge</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-blue-50/40 text-gray-800">

    <div class="flex min-h-screen">

        @include('partials.sidebar')

        <div class="flex-1 flex flex-col min-w-0">

            <header class="bg-white border-b px-8 py-4 flex justify-between items-center">
                <h1 class="text-xl font-bold text-gray-900">@yield('title', 'Dashboard')</h1>

                <div class="flex items-center gap-2">
                    <div class="w-9 h-9 rounded-full bg-indigo-600 text-white flex items-center justify-center text-sm font-semibold">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div class="hidden sm:block text-left">
                        <p class="text-sm font-medium leading-none">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-500 capitalize">{{ auth()->user()->role }}</p>
                    </div>
                </div>
            </header>

            <main class="flex-1 p-8 max-w-6xl w-full mx-auto">

                @if (session('success'))
                    <div class="mb-4 p-3 rounded bg-green-100 text-green-800 border border-green-300">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-4 p-3 rounded bg-red-100 text-red-800 border border-red-300">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>
