<section class="py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6">
        <div class="mb-8 flex items-end justify-between">
            <div>
                <span class="eyebrow">By the numbers</span>
                <h2 class="mt-3 text-2xl font-bold text-heading">Skillora stats</h2>
            </div>
        </div>

        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            <div class="card card-hover flex flex-col items-center gap-3 p-5 text-center">
                <div class="stat-icon bg-primary-50 text-primary-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="7" width="18" height="13" rx="2" /><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" /></svg>
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-muted">Open Jobs</p>
                    <p class="mt-1 text-2xl font-extrabold text-heading">{{ \App\Models\Job::open()->count() }}</p>
                </div>
            </div>

            <div class="card card-hover flex flex-col items-center gap-3 p-5 text-center">
                <div class="stat-icon bg-secondary-100 text-secondary-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" /><circle cx="9" cy="7" r="4" /><path stroke-linecap="round" stroke-linejoin="round" d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" /></svg>
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-muted">Freelancers</p>
                    <p class="mt-1 text-2xl font-extrabold text-heading">{{ \App\Models\User::where('role','freelancer')->count() }}</p>
                </div>
            </div>

            <div class="card card-hover flex flex-col items-center gap-3 p-5 text-center">
                <div class="stat-icon bg-success-50 text-success-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-6h6v6M9 11h.01M9 15h.01M15 11h.01M15 15h.01" /></svg>
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-muted">Clients</p>
                    <p class="mt-1 text-2xl font-extrabold text-heading">{{ \App\Models\User::where('role','client')->count() }}</p>
                </div>
            </div>

            <div class="card card-hover flex flex-col items-center gap-3 p-5 text-center">
                <div class="stat-icon bg-warning-50 text-warning-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7a2 2 0 0 1 2-2h4l2 2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7Z" /></svg>
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-muted">Categories</p>
                    <p class="mt-1 text-2xl font-extrabold text-heading">{{ \App\Models\Category::count() }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
