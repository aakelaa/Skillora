@extends('layouts.dashboard')

@section('title', 'Edit Freelancer Profile')

@section('content')

    <div class="mx-auto max-w-3xl rounded-[32px] border border-slate-200 bg-white p-10 shadow-card">
        <div class="mb-8">
            <h1 class="text-3xl font-semibold text-heading">Edit Freelancer Profile</h1>
            <p class="mt-2 text-sm text-paragraph">Refine your freelancer profile and stand out to the best clients.</p>
        </div>

        <form method="POST" action="{{ route('freelancer-profile.update') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <x-input-label for="bio" value="Bio" />
                <textarea id="bio" name="bio" rows="5" class="mt-3 block w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10">{{ old('bio', $profile->bio ?? '') }}</textarea>
            </div>

            <div>
                <x-input-label for="skills" value="Skills (comma separated)" />
                <x-text-input id="skills" name="skills" value="{{ old('skills', $profile->skills ?? '') }}" class="mt-3 block w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10" />
            </div>

            <div>
                <x-input-label for="resume" value="Resume (PDF/DOC)" />
                <input id="resume" type="file" name="resume" class="mt-3 block w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10" />
                @if ($profile?->resume_path)
                    <p class="mt-3 text-sm text-slate-600">
                        <a href="{{ Storage::url($profile->resume_path) }}" class="font-semibold text-primary hover:text-primary/80">View current resume</a>
                    </p>
                @endif
            </div>

            <div>
                <x-input-label for="portfolio_image" value="Portfolio Image" />
                <input id="portfolio_image" type="file" name="portfolio_image" class="mt-3 block w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10" />
                @if ($profile?->portfolio_image_path)
                    <img src="{{ Storage::url($profile->portfolio_image_path) }}" class="mt-4 h-24 rounded-3xl border border-slate-200 object-cover" alt="Portfolio image">
                @endif
            </div>

            <div class="flex justify-end">
                <button type="submit" class="w-full py-3 rounded-full bg-primary text-white font-semibold text-center flex items-center justify-center hover:opacity-90 transition">
        Save Profile
    </button>
            </div>
        </form>
    </div>
@endsection
