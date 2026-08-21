<nav class="sticky top-0 z-50 border-b border-border bg-white/95 backdrop-blur-xl">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
        <a href="{{ route('home') }}" class="flex items-center gap-2 text-lg font-bold text-heading">
            <span class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-primary text-white text-sm">S</span>
            Skillora
        </a>

        <div class="hidden items-center gap-2 lg:flex">
            <a href="{{ route('jobs.index') }}" class="rounded-lg px-3 py-2 text-sm font-semibold text-paragraph transition hover:bg-background hover:text-heading">Browse Jobs</a>
            <a href="{{ route('categories.index') }}" class="rounded-lg px-3 py-2 text-sm font-semibold text-paragraph transition hover:bg-background hover:text-heading">Categories</a>

            @auth
                <a href="{{ auth()->user()->isAdmin() ? route('admin.dashboard') : (auth()->user()->isClient() ? route('clients.dashboard') : route('freelancer.dashboard')) }}" class="btn-secondary ml-2">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="ml-1 rounded-lg px-3 py-2 text-sm font-semibold text-danger-600 transition hover:bg-danger-50">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="rounded-lg px-3 py-2 text-sm font-semibold text-paragraph transition hover:bg-background hover:text-heading">Login</a>
                <a href="{{ route('register') }}" class="btn-primary ml-2">Register</a>
            @endauth
        </div>

        <button class="grid h-10 w-10 place-items-center rounded-lg border border-border text-paragraph lg:hidden" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm1 4a1 1 0 100 2h12a1 1 0 100-2H4z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>

    <div id="mobile-menu" class="hidden border-t border-border bg-white px-4 py-4 lg:hidden">
        <a href="{{ route('jobs.index') }}" class="block rounded-lg px-3 py-2.5 text-sm font-semibold text-paragraph hover:bg-background">Browse Jobs</a>
        <a href="{{ route('categories.index') }}" class="block rounded-lg px-3 py-2.5 text-sm font-semibold text-paragraph hover:bg-background">Categories</a>

        @auth
            <a href="{{ auth()->user()->isAdmin() ? route('admin.dashboard') : (auth()->user()->isClient() ? route('clients.dashboard') : route('freelancer.dashboard')) }}" class="btn-secondary mt-3 block text-center">Dashboard</a>
            <form method="POST" action="{{ route('logout') }}" class="mt-2">
                @csrf
                <button type="submit" class="btn-danger block w-full text-center">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="block rounded-lg px-3 py-2.5 text-sm font-semibold text-paragraph hover:bg-background">Login</a>
            <a href="{{ route('register') }}" class="btn-primary mt-2 block text-center">Register</a>
        @endauth
    </div>
</nav>
