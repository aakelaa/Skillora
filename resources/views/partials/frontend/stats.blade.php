<section class="py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6">
        <div class="mb-8 flex items-end justify-between">
            <div>
                <span class="eyebrow">By the numbers</span>
                <h2 class="mt-3 text-2xl font-bold text-heading">Skillora at a glance</h2>
            </div>
        </div>

        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            <div class="stat-card">

                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-muted">Open Jobs</p>
                    <p class="mt-1 text-2xl font-extrabold text-heading">{{ \App\Models\Job::open()->count() }}</p>
                </div>
            </div>

            <div class="stat-card">

                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-muted">Freelancers</p>
                    <p class="mt-1 text-2xl font-extrabold text-heading">{{ \App\Models\User::where('role','freelancer')->count() }}</p>
                </div>
            </div>

            <div class="stat-card">

                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-muted">Clients</p>
                    <p class="mt-1 text-2xl font-extrabold text-heading">{{ \App\Models\User::where('role','client')->count() }}</p>
                </div>
            </div>

            <div class="stat-card">

                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-muted">Categories</p>
                    <p class="mt-1 text-2xl font-extrabold text-heading">{{ \App\Models\Category::count() }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
