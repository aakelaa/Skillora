@extends('layouts.app')

@section('title', 'Find Freelance Work & Talent')

@section('content')

    {{--  HERO SECTION --}}
    <div class="-mx-4 -mt-8 bg-blue-50 px-4 pt-16 pb-20 text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 max-w-3xl mx-auto leading-tight">
            Find Your Dream Freelance Project or Hire Top Talent
        </h1>

        <form method="GET" action="{{ route('jobs.index') }}"
              class="mt-8 max-w-2xl mx-auto bg-white rounded-lg shadow-sm border flex overflow-hidden">
            <div class="flex items-center flex-1 px-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <input type="text" name="keyword" placeholder="Keywords"
                       value="{{ request('keyword') }}"
                       class="w-full border-0 focus:ring-0 text-sm py-3 px-2">
            </div>

            <div class="border-l flex items-center px-4">
                <select name="category" class="border-0 focus:ring-0 text-sm text-gray-600 bg-transparent">
                    <option value="">Category</option>
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" @selected(request('category') == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </button>
        </form>
    </div>

    {{-- JOB CARDS GRID --}}
    <div class="py-10">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold">Latest Opportunities</h2>
            <a href="{{ route('jobs.index') }}" class="text-sm text-indigo-600 hover:underline">View all &rarr;</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse (\App\Models\Job::open()->with('client', 'category')->latest()->take(6)->get() as $job)
                <div class="bg-white rounded-lg shadow-sm border overflow-hidden hover:shadow-md transition">
                    <img src="https://picsum.photos/seed/{{ $job->id }}/400/300"
                         alt="{{ $job->title }}" class="w-full h-40 object-cover">

                    <div class="p-4">
                        <h3 class="font-bold text-gray-900">{{ $job->title }}</h3>
                        <p class="text-sm text-gray-500 mt-1">
                            {{ $job->category->name ?? 'General' }} &middot; {{ $job->client->name }}
                        </p>

                        <div class="flex justify-between items-center mt-4">
                            <span class="text-sm text-gray-700">Budget: <strong>{{ $job->budget_formatted }}</strong></span>
                            <a href="{{ route('jobs.show', $job) }}"
                               class="bg-indigo-600 text-white text-sm px-4 py-1.5 rounded hover:bg-indigo-700">
                                Apply
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 col-span-full text-center">No open jobs right now — check back soon!</p>
            @endforelse
        </div>
    </div>

    {{--  STATS STRIP  --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 py-8 border-t">
        <div class="text-center">
            <p class="text-2xl font-bold text-indigo-600">{{ \App\Models\Job::open()->count() }}</p>
            <p class="text-sm text-gray-500">Open Jobs</p>
        </div>
        <div class="text-center">
            <p class="text-2xl font-bold text-indigo-600">{{ \App\Models\User::where('role', 'freelancer')->count() }}</p>
            <p class="text-sm text-gray-500">Freelancers</p>
        </div>
        <div class="text-center">
            <p class="text-2xl font-bold text-indigo-600">{{ \App\Models\User::where('role', 'client')->count() }}</p>
            <p class="text-sm text-gray-500">Clients</p>
        </div>
        <div class="text-center">
            <p class="text-2xl font-bold text-indigo-600">{{ \App\Models\Category::count() }}</p>
            <p class="text-sm text-gray-500">Categories</p>
        </div>
    </div>

@endsection
