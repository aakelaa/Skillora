<nav class="sticky top-0 z-50 border-b border-slate-200 bg-background/95 backdrop-blur-xl shadow-sm">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <div class="grid h-12 w-12 place-items-center rounded-3xl bg-gradient-to-br from-primary to-secondary text-white shadow-card">S</div>
            <div class="hidden md:block text-sm">
                <p class="font-semibold text-heading">Skillora</p>
                <p class="text-muted">Freelance marketplace</p>
            </div>
        </a>

        <div class="hidden lg:flex items-center gap-8 text-sm text-slate-600">
            <a href="{{ route('home') }}" class="hover:text-primary transition">Home</a>
            <a href="{{ url('/about') }}" class="hover:text-primary transition">About</a>
            <a href="{{ url('/services') }}" class="hover:text-primary transition">Services</a>
            <a href="{{ route('jobs.index') }}" class="hover:text-primary transition">Browse Jobs</a>
            <a href="{{ route('categories.index') }}" class="hover:text-primary transition">Categories</a>
            <a href="{{ url('/faq') }}" class="hover:text-primary transition">FAQ</a>
            <a href="{{ url('/contact') }}" class="hover:text-primary transition">Contact</a>
        </div>

        <div class="flex items-center gap-3">
            @auth
                @php $user = auth()->user(); @endphp
                <a href="{{ $user->isAdmin() ? route('admin.dashboard') : ($user->isClient() ? route('clients.dashboard') : route('freelancer.dashboard')) }}" class="hidden rounded-full bg-surface px-4 py-2 text-sm font-semibold text-slate-800 shadow-sm transition hover:-translate-y-px lg:inline-flex">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-sm font-medium text-slate-600 transition hover:text-primary">Login</a>
                <a href="{{ route('register') }}" class="hidden rounded-full bg-primary px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-px lg:inline-flex">Create account</a>
            @endauth
            <button class="lg:hidden rounded-full border border-slate-200 bg-white p-2 text-slate-600 shadow-sm" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
        </div>
    </div>

    <div id="mobile-menu" class="hidden border-t border-slate-200 bg-white px-4 py-4 lg:hidden">
        <div class="space-y-2 text-sm text-slate-700">
            <a href="{{ route('home') }}" class="block rounded-2xl px-4 py-3 hover:bg-slate-50">Home</a>
            <a href="{{ url('/about') }}" class="block rounded-2xl px-4 py-3 hover:bg-slate-50">About</a>
            <a href="{{ url('/services') }}" class="block rounded-2xl px-4 py-3 hover:bg-slate-50">Services</a>
            <a href="{{ route('jobs.index') }}" class="block rounded-2xl px-4 py-3 hover:bg-slate-50">Browse Jobs</a>
            <a href="{{ route('categories.index') }}" class="block rounded-2xl px-4 py-3 hover:bg-slate-50">Categories</a>
            <a href="{{ url('/faq') }}" class="block rounded-2xl px-4 py-3 hover:bg-slate-50">FAQ</a>
            <a href="{{ url('/contact') }}" class="block rounded-2xl px-4 py-3 hover:bg-slate-50">Contact</a>
        </div>
    </div>
</nav>
