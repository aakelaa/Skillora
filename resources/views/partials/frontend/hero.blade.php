<section class="relative overflow-hidden bg-white">
    <div class="absolute inset-x-0 top-0 h-[520px] bg-gradient-to-b from-primary-50 via-white to-white"></div>
    <div class="absolute -right-40 top-10 h-96 w-96 rounded-full bg-secondary-100/60 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-4 pb-16 pt-14 sm:px-6 lg:pt-20">
        <div class="grid gap-12 lg:grid-cols-[1.15fr_0.85fr] lg:items-center">
            <div class="space-y-7">
                <span class="eyebrow">Trusted by 1,200+ businesses</span>

                <h1 class="max-w-xl text-3xl font-extrabold leading-tight tracking-tight text-heading sm:text-5xl">
                    Connect with the right talent, and bring your best ideas to life.
                </h1>
                <p class="max-w-xl text-lg text-paragraph">
                    Skillora makes freelance hiring simple for businesses and professionals. Discover skilled talent, explore opportunities, and build meaningful working relationships.
                </p>

                <form method="GET" action="{{ route('jobs.index') }}" class="card flex flex-col gap-3 p-3 sm:flex-row sm:items-center">
                    <label class="sr-only" for="hero-search">Search jobs</label>
                    <input id="hero-search" type="text" name="keyword" value="{{ request('keyword') }}" placeholder="Search jobs, skills, or categories" class="flex-1 !border-0 !bg-background !ring-0 focus:!ring-4 focus:!ring-primary-50" />
                    <select name="category" class="sm:w-52 !border-0 !bg-background">
                        <option value="">All Categories</option>
                        @foreach(\App\Models\Category::limit(20)->get() as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn-primary shrink-0">Search jobs</button>
                </form>

                <div class="grid grid-cols-3 gap-3 pt-2 sm:gap-4">
                    <div class="card card-hover flex flex-col items-center justify-center gap-1 px-3 py-4 text-center">
                        <p class="text-2xl font-extrabold text-heading">{{ \App\Models\Job::open()->count() }}+</p>
                        <p class="text-xs font-medium text-muted sm:text-sm">Jobs listed</p>
                    </div>
                    <div class="card card-hover flex flex-col items-center justify-center gap-1 px-3 py-4 text-center">
                        <p class="text-2xl font-extrabold text-heading">{{ \App\Models\User::where('role','freelancer')->count() }}+</p>
                        <p class="text-xs font-medium text-muted sm:text-sm">Freelancers</p>
                    </div>
                    <div class="card card-hover flex flex-col items-center justify-center gap-1 px-3 py-4 text-center">
                        <p class="text-2xl font-extrabold text-heading">{{ \App\Models\User::where('role','client')->count() }}+</p>
                        <p class="text-xs font-medium text-muted sm:text-sm">Clients</p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -inset-4 rounded-[28px] bg-gradient-to-br from-primary-100 to-secondary-100 -z-10 rotate-2"></div>
                <img
                    src="{{ asset('build/assets/images/hero_illustration.png') }}"
                    alt="Skillora Freelance Platform"
                    class="h-[420px] w-full rounded-2xl object-cover shadow-card-hover"
                >
            </div>
        </div>
    </div>
</section>
