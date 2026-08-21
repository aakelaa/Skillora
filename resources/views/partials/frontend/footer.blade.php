<footer class="border-t border-border bg-white">
    <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6">
        <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-4">
            <div class="space-y-4 sm:col-span-2 lg:col-span-1">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2.5">
                    <span class="font-bold text-heading">Skillora</span>
                </a>
                <p class="max-w-xs text-sm text-paragraph">A marketplace for clients and freelancers with seamless hiring, applications, and project workflows.</p>
            </div>

            <div>
                <div class="text-sm font-semibold text-heading">Platform</div>
                <ul class="mt-4 space-y-3 text-sm text-paragraph">
                    <li><a href="{{ route('jobs.index') }}" class="transition hover:text-primary">Browse Jobs</a></li>
                    <li><a href="{{ route('categories.index') }}" class="transition hover:text-primary">Categories</a></li>
                    <li><a href="{{ route('register') }}" class="transition hover:text-primary">Create Account</a></li>
                    <li><a href="{{ url('/how-it-works') }}" class="transition hover:text-primary">How It Works</a></li>
                </ul>
            </div>

            <div>
                <div class="text-sm font-semibold text-heading">Company</div>
                <ul class="mt-4 space-y-3 text-sm text-paragraph">
                    <li><a href="{{ url('/about') }}" class="transition hover:text-primary">About Us</a></li>
                    <li><a href="{{ url('/services') }}" class="transition hover:text-primary">Services</a></li>
                    <li><a href="{{ url('/faq') }}" class="transition hover:text-primary">FAQ</a></li>
                    <li><a href="{{ url('/contact') }}" class="transition hover:text-primary">Contact</a></li>
                </ul>
            </div>

            <div>
                <div class="text-sm font-semibold text-heading">Legal</div>
                <ul class="mt-4 space-y-3 text-sm text-paragraph">
                    <li><a href="{{ url('/privacy') }}" class="transition hover:text-primary">Privacy Policy</a></li>
                    <li><a href="{{ url('/terms') }}" class="transition hover:text-primary">Terms &amp; Conditions</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="border-t border-border py-6 text-center text-sm text-muted">
        &copy; {{ date('Y') }} Skillora. All rights reserved.
    </div>
</footer>
