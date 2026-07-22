<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - FreelanceHub</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800">

    <div class="flex min-h-screen">

        @include('partials.sidebar')

        <div class="flex-1 flex flex-col min-w-0">

            <header class="bg-white border-b px-6 py-3 flex justify-between items-center">
                <h1 class="text-lg font-semibold">@yield('title', 'Dashboard')</h1>
                <span class="text-sm text-gray-500">{{ now()->format('l, d M Y') }}</span>
            </header>

            <main class="flex-1 p-6 max-w-5xl w-full mx-auto">

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
