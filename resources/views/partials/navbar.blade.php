<nav class="bg-white shadow">
    <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
        <a href="{{ route('home') }}" class="font-bold text-lg text-gray-900">
            Work<span class="text-indigo-600">Bridge</span>
        </a>

        <div class="flex items-center gap-4 text-sm">
            <a href="{{ route('jobs.index') }}" class="hover:text-indigo-600">Browse Jobs</a>
            <a href="{{ route('categories.index') }}" class="hover:text-indigo-600">Categories</a>

            @auth
                @if (auth()->user()->isClient())
                    <a href="{{ route('clients.dashboard') }}" class="hover:text-indigo-600">Dashboard</a>
                @endif

                @if (auth()->user()->isFreelancer())
                    <a href="{{ route('freelancer.dashboard') }}" class="hover:text-indigo-600">Dashboard</a>
                @endif

                @if (auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="hover:text-indigo-600">Dashboard</a>
                @endif

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red-600 hover:underline">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hover:text-indigo-600">Login</a>
                <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-4 py-1.5 rounded hover:bg-indigo-700">Register</a>
            @endauth
        </div>
    </div>
</nav>
