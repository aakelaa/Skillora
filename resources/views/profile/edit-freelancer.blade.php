@extends('layouts.dashboard')

@section('title', 'My Profile')

@section('content')

    <form method="POST" action="{{ route('freelancer-profile.update') }}" enctype="multipart/form-data"
          class="bg-white p-6 rounded shadow-sm border max-w-2xl space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium mb-1">Bio</label>
            <textarea name="bio" rows="4" class="w-full border rounded p-2 text-sm">{{ old('bio', $profile->bio ?? '') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Skills (comma separated)</label>
            <input type="text" name="skills" value="{{ old('skills', $profile->skills ?? '') }}" class="w-full border rounded p-2 text-sm">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Resume (PDF/DOC)</label>
            <input type="file" name="resume" class="w-full border rounded p-2 text-sm">
            @if ($profile?->resume_path)
                <a href="{{ Storage::url($profile->resume_path) }}" class="text-xs text-indigo-600 hover:underline">
                    View current resume
                </a>
            @endif
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Portfolio Image</label>
            <input type="file" name="portfolio_image" class="w-full border rounded p-2 text-sm">
            @if ($profile?->portfolio_image_path)
                <img src="{{ Storage::url($profile->portfolio_image_path) }}" class="mt-2 h-24 rounded">
            @endif
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded text-sm">Save Profile</button>
    </form>
@endsection
