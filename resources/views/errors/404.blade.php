@extends('layouts.app')

@section('title', 'Page Not Found')

@section('content')
    <div class="text-center py-20">
        <p class="text-6xl font-bold text-indigo-600">404</p>
        <p class="text-xl mt-4">Oops, we couldn't find that page.</p>
        <a href="{{ route('jobs.index') }}" class="inline-block mt-6 text-indigo-600 hover:underline">
            &larr; Back to job listings
        </a>
    </div>
@endsection
