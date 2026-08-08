<nav class="sticky top-0 z-50 border-b border-slate-200 bg-background/95 backdrop-blur-xl shadow-sm">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
        <a href="{{ route('home') }}" class="flex items-center gap-2 text-lg font-semibold text-heading">
            <span class="text-primary">Work</span>Bridge
        </a>

        <div class="hidden items-center gap-4 lg:flex">
            <a href="{{ route('jobs.index') }}" class="text-sm font-semibold text-slate-700 transition hover:text-slate-900">Browse Jobs</a>
            <a href="{{ route('categories.index') }}" class="text-sm font-semibold text-slate-700 transition hover:text-slate-900">Categories</a>

            @auth
                <a href="{{ auth()->user()->isAdmin() ? route('admin.dashboard') : (auth()->user()->isClient() ? route('clients.dashboard') : route('freelancer.dashboard')) }}" class="rounded-full bg-surface px-4 py-2 text-sm font-semibold text-slate-800 shadow-sm transition hover:-translate-y-px">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-sm font-semibold text-red-600 transition hover:text-red-700">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-700 transition hover:text-slate-900">Login</a>
                <a href="{{ route('register') }}" class="rounded-full bg-primary px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-px">Register</a>
            @endauth
        </div>

        <button class="lg:hidden rounded-full border border-slate-200 bg-white p-2 text-slate-600 shadow-sm" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm1 4a1 1 0 100 2h12a1 1 0 100-2H4z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>

    <div id="mobile-menu" class="hidden border-t border-slate-200 bg-background/95 px-4 py-4">
        <a href="{{ route('jobs.index') }}" class="block py-2 text-sm font-semibold text-slate-700 transition hover:text-slate-900">Browse Jobs</a>
        <a href="{{ route('categories.index') }}" class="block py-2 text-sm font-semibold text-slate-700 transition hover:text-slate-900">Categories</a>

        @auth
            <a href="{{ auth()->user()->isAdmin() ? route('admin.dashboard') : (auth()->user()->isClient() ? route('clients.dashboard') : route('freelancer.dashboard')) }}" class="block rounded-full bg-surface px-4 py-2 text-sm font-semibold text-slate-800 shadow-sm text-center mt-2">Dashboard</a>
            <form method="POST" action="{{ route('logout') }}" class="mt-2">
                @csrf
                <button type="submit" class="block w-full rounded-full border border-red-200 bg-red-50 px-4 py-2 text-sm font-semibold text-red-700 hover:bg-red-100">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="block py-2 text-sm font-semibold text-slate-700 transition hover:text-slate-900">Login</a>
            <a href="{{ route('register') }}" class="block rounded-full bg-primary px-4 py-2 text-sm font-semibold text-white shadow-sm text-center mt-2">Register</a>
        @endauth
    </div>
</nav>
