<footer class="bg-white border-t border-slate-200 text-slate-600">
    <div class="mx-auto grid max-w-4xl gap-8 px-4 py-14 sm:grid-cols-3 lg:px-6 text-center">
        <div class="space-y-4 flex flex-col items-center">
            <div class="text-lg font-semibold text-heading ">Skillora</div>
            <p class="text-sm text-muted max-w-xs">A marketplace for clients and freelancers with seamless hiring, applications, and project workflows.</p>
        </div>

        <div class="flex flex-col items-center">
             <div class="text-lg font-semibold text-heading ">Platform</div>
            <ul class="mt-4 space-y-3 text-sm text-slate-600">
                <li><a href="{{ route('jobs.index') }}" class="hover:text-primary transition">Browse Jobs</a></li>
                <li><a href="{{ route('categories.index') }}" class="hover:text-primary transition">Categories</a></li>
                <li><a href="{{ route('register') }}" class="hover:text-primary transition">Create Account</a></li>
            </ul>
        </div>

        <div class="flex flex-col items-center">
             <div class="text-lg font-semibold text-heading ">Company</div>
            <ul class="mt-4 space-y-3 text-sm text-slate-600">
                <li><a href="{{ url('/about') }}" class="hover:text-primary transition">About Us</a></li>
                <li><a href="{{ url('/contact') }}" class="hover:text-primary transition">Contact</a></li>
                <li><a href="{{ url('/privacy') }}" class="hover:text-primary transition">Privacy Policy</a></li>
                <li><a href="{{ url('/terms') }}" class="hover:text-primary transition">Terms</a></li>
            </ul>
        </div>
    </div>

    <div class="border-t border-slate-200 bg-background py-6 text-center text-sm text-muted">
        &copy; {{ date('Y') }} Skillora. All rights reserved.
    </div>
</footer>
