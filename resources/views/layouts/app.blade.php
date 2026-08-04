<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FreelanceHub')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800">

    @include('partials.navbar')

    <main class="max-w-6xl mx-auto px-4 py-8">

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

    <footer class="text-center text-sm text-gray-500 py-6">
        &copy; {{ date('Y') }} FreelanceHub. Internship project.
    </footer>

</body>
</html>
