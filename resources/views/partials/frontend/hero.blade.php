<section class="relative overflow-hidden bg-background pb-20 pt-16">
    <div class="absolute inset-x-0 top-0 h-80 bg-gradient-to-br from-primary/10 via-white to-white"></div>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6">
        <div class="grid gap-10 lg:grid-cols-[1.2fr_0.8fr] lg:items-center">
            <div class="space-y-8">
                <div class="space-y-6">
                    <h1 class="max-w-xl text-2xl font-bold tracking-tight text-heading sm:text-4xl">Connect with the right talent and bring your best ideas to life..</h1>
                    <p class="max-w-2xl text-lg text-paragraph">Skillora makes freelance hiring simple for businesses and <br> professionals. Discover skilled talent, explore opportunities, <br> and build meaningful working relationships.</p>
                </div>

                <div class="grid gap-4 sm:grid-cols-[1fr_auto] sm:items-center">
                    <form method="GET" action="{{ route('jobs.index') }}" class="grid gap-3 rounded-[28px] border border-slate-200 bg-white p-4 shadow-card sm:grid-cols-[1.4fr_0.8fr_auto]">
                        <label class="sr-only" for="hero-search">Search jobs</label>
                        <input id="hero-search" type="text" name="keyword" value="{{ request('keyword') }}" placeholder="Search jobs, skills, or categories" class="rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10" />
                        <select name="category" class="rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10">
                            <option value="">All Categories</option>
                            @foreach(\App\Models\Category::limit(20)->get() as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn-primary rounded-3xl px-6 py-3 text-sm">Search jobs</button>
                    </form>
                </div>

                <div class="grid max-w-2xl gap-3 sm:grid-cols-2">
                     <div class="rounded-[22px] border border-slate-200 bg-surface px-5 py-4 shadow-sm">

                         <p class="text-sm text-muted">Jobs listed</p>
                                <p class="mt-1 text-xl font-semibold text-heading">{{ \App\Models\Job::open()->count() }} </p>

                 </div>

               <div class="rounded-[22px] border border-slate-200 bg-surface px-5 py-4 shadow-sm">
                 <p class="text-sm text-muted">Freelancers</p>
                         <p class="mt-1 text-xl font-semibold text-heading">{{ \App\Models\User::where('role','freelancer')->count() }}</p>


                </div>
            </div>
            </div>

            <div class="relative flex items-center justify-center">
    <img
        src="{{ asset('build/assets/images/hero_illustration.jpeg') }}"
        alt="Skillora Freelance Platform"
        class="h-[420px] w-full max-w-[520px] rounded-[32px] object-cover shadow-card"
    >
</div>
        </div>
    </div>
</section>
