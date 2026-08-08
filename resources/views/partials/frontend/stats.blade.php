<section class="bg-background py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6">

        <h2 class="mb-8 text-2xl font-semibold text-heading">
            Skillora Stats
        </h2>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-card">
                <p class="text-sm uppercase tracking-[0.24em] text-muted">Open Jobs</p>
                <p class="mt-4 text-3xl font-semibold text-heading">
                    {{ \App\Models\Job::open()->count() }}
                </p>
            </div>

            <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-card">
                <p class="text-sm uppercase tracking-[0.24em] text-muted">Freelancers</p>
                <p class="mt-4 text-3xl font-semibold text-heading">
                    {{ \App\Models\User::where('role','freelancer')->count() }}
                </p>
            </div>

            <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-card">
                <p class="text-sm uppercase tracking-[0.24em] text-muted">Clients</p>
                <p class="mt-4 text-3xl font-semibold text-heading">
                    {{ \App\Models\User::where('role','client')->count() }}
                </p>
            </div>

            <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-card">
                <p class="text-sm uppercase tracking-[0.24em] text-muted">Categories</p>
                <p class="mt-4 text-3xl font-semibold text-heading">
                    {{ \App\Models\Category::count() }}
                </p>
            </div>
        </div>

    </div>
</section>
