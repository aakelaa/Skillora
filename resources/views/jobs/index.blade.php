@extends('layouts.app')

@section('title', 'Browse Jobs')

@section('content')
    <h1 class="text-2xl font-bold mb-6">
        {{ isset($activeCategory) ? $activeCategory->name . ' Jobs' : 'Open Jobs' }}
    </h1>

    <form method="GET" class="mb-6 flex gap-3">
        <input type="text" name="keyword" placeholder="Search by title..." value="{{ request('keyword') }}"
               class="flex-1 border rounded p-2 text-sm">
        <select name="category" class="border rounded p-2 text-sm">
            <option value="">All Categories</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(request('category') == $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded text-sm">Search</button>
    </form>

    <div class="grid gap-4">
        @forelse ($jobs as $job)
            <div class="bg-white p-4 rounded shadow-sm border">
                <div class="flex justify-between items-start">
                    <div>
                        <a href="{{ route('jobs.show', $job) }}" class="text-lg font-semibold text-indigo-700 hover:underline">
                            {{ $job->title }}
                        </a>
                        <p class="text-sm text-gray-500">
                            Posted by {{ $job->client->name }}
                            @if ($job->category) &middot; {{ $job->category->name }} @endif
                        </p>
                    </div>
                    <span class="text-sm font-medium text-green-700">{{ $job->budget_formatted }}</span>
                </div>

                <p class="text-gray-600 mt-2 text-sm">{{ Str::limit($job->description, 120) }}</p>

                <p class="text-xs text-gray-400 mt-2">{{ $job->deadline_countdown }}</p>
            </div>
        @empty
            <p class="text-gray-500">No open jobs right now. Check back soon!</p>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $jobs->links() }}
    </div>
@endsection
