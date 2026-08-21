@extends('layouts.dashboard')

@section('title', 'Edit Freelancer Profile')

@section('content')

    <div class="mx-auto max-w-3xl">
        <div class="page-header !border-none !mb-6">
            <div>
                <h1 class="page-title">Edit Freelancer Profile</h1>
                <p class="page-subtitle">Refine your freelancer profile and stand out to the best clients.</p>
            </div>
        </div>

        <div class="card-padded">
            <form method="POST" action="{{ route('freelancer-profile.update') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="field-group">
                    <x-input-label for="bio" value="Bio" />
                    <textarea id="bio" name="bio" rows="5" class="mt-1" placeholder="Tell clients about your experience and expertise...">{{ old('bio', $profile->bio ?? '') }}</textarea>
                </div>

                <div class="field-group">
                    <x-input-label for="skills" value="Skills (comma separated)" />
                    <x-text-input id="skills" name="skills" value="{{ old('skills', $profile->skills ?? '') }}" class="mt-1" placeholder="e.g. Laravel, React, UI/UX Design" />
                    <p class="field-hint">Separate each skill with a comma.</p>
                </div>

                <div class="field-group">
                    <x-input-label for="resume" value="Resume (PDF/DOC)" />
                    <input id="resume" type="file" name="resume" class="mt-1" />
                    @if ($profile?->resume_path)
                        <a href="{{ Storage::url($profile->resume_path) }}" target="_blank" class="mt-3 inline-flex items-center gap-2 rounded-lg border border-border bg-background px-3 py-2 text-sm font-semibold text-primary hover:bg-primary-50">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" /></svg>
                            View current resume
                        </a>
                    @endif
                </div>

                <div class="field-group">
                    <x-input-label for="portfolio_image" value="Portfolio Image" />
                    <input id="portfolio_image" type="file" name="portfolio_image" class="mt-1" />
                    @if ($profile?->portfolio_image_path)
                        <img src="{{ Storage::url($profile->portfolio_image_path) }}" class="mt-4 h-28 w-28 rounded-xl border border-border object-cover" alt="Portfolio image">
                    @endif
                </div>

                <button type="submit" class="btn-primary w-full">Save Profile</button>
            </form>
        </div>
    </div>
@endsection
