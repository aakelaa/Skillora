<nav class="sticky top-0 z-50 border-b border-border bg-white/90 backdrop-blur-xl">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3.5 sm:px-6">
        <a href="{{ route('home') }}" class="flex items-center gap-2.5">
            <span class="grid h-10 w-10 place-items-center rounded-xl bg-primary text-white font-bold shadow-xs">S</span>
            <span class="hidden sm:block leading-tight">
                <span class="block font-bold text-heading">Skillora</span>
                <span class="block text-[11px] font-medium text-muted">Freelance marketplace</span>
            </span>
        </a>

        <div class="hidden lg:flex items-center gap-1 text-sm">
            <a href="{{ route('home') }}" class="rounded-lg px-3.5 py-2 font-semibold text-paragraph transition hover:bg-background hover:text-heading">Home</a>
            <a href="{{ url('/about') }}" class="rounded-lg px-3.5 py-2 font-semibold text-paragraph transition hover:bg-background hover:text-heading">About</a>
            <a href="{{ url('/services') }}" class="rounded-lg px-3.5 py-2 font-semibold text-paragraph transition hover:bg-background hover:text-heading">Services</a>
            <a href="{{ route('jobs.index') }}" class="rounded-lg px-3.5 py-2 font-semibold text-paragraph transition hover:bg-background hover:text-heading">Browse Jobs</a>
            <a href="{{ route('categories.index') }}" class="rounded-lg px-3.5 py-2 font-semibold text-paragraph transition hover:bg-background hover:text-heading">Categories</a>
            <a href="{{ url('/faq') }}" class="rounded-lg px-3.5 py-2 font-semibold text-paragraph transition hover:bg-background hover:text-heading">FAQ</a>
            <a href="{{ url('/contact') }}" class="rounded-lg px-3.5 py-2 font-semibold text-paragraph transition hover:bg-background hover:text-heading">Contact</a>
        </div>

        <div class="flex items-center gap-3">
            @auth
                @php $user = auth()->user(); @endphp
                <a href="{{ $user->isAdmin() ? route('admin.dashboard') : ($user->isClient() ? route('clients.dashboard') : route('freelancer.dashboard')) }}" class="btn-secondary hidden lg:inline-flex">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="hidden text-sm font-semibold text-paragraph hover:text-heading lg:inline-block">Login</a>
                <a href="{{ route('register') }}" class="btn-primary hidden lg:inline-flex">Create account</a>
            @endauth
            <button class="grid h-10 w-10 place-items-center rounded-lg border border-border text-paragraph lg:hidden" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="hidden border-t border-border bg-white px-4 py-4 lg:hidden">
        <div class="space-y-1 text-sm">
            <a href="{{ route('home') }}" class="block rounded-lg px-3.5 py-2.5 font-semibold text-paragraph hover:bg-background">Home</a>
            <a href="{{ url('/about') }}" class="block rounded-lg px-3.5 py-2.5 font-semibold text-paragraph hover:bg-background">About</a>
            <a href="{{ url('/services') }}" class="block rounded-lg px-3.5 py-2.5 font-semibold text-paragraph hover:bg-background">Services</a>
            <a href="{{ route('jobs.index') }}" class="block rounded-lg px-3.5 py-2.5 font-semibold text-paragraph hover:bg-background">Browse Jobs</a>
            <a href="{{ route('categories.index') }}" class="block rounded-lg px-3.5 py-2.5 font-semibold text-paragraph hover:bg-background">Categories</a>
            <a href="{{ url('/faq') }}" class="block rounded-lg px-3.5 py-2.5 font-semibold text-paragraph hover:bg-background">FAQ</a>
            <a href="{{ url('/contact') }}" class="block rounded-lg px-3.5 py-2.5 font-semibold text-paragraph hover:bg-background">Contact</a>
            <div class="mt-3 border-t border-border pt-3">
                @auth
                    <a href="{{ auth()->user()->isAdmin() ? route('admin.dashboard') : (auth()->user()->isClient() ? route('clients.dashboard') : route('freelancer.dashboard')) }}" class="btn-secondary block text-center">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="block rounded-lg px-3.5 py-2.5 text-center font-semibold text-paragraph hover:bg-background">Login</a>
                    <a href="{{ route('register') }}" class="btn-primary mt-2 block text-center">Create account</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
