@extends('layouts.dashboard')

@section('title', 'Post a Job')

@section('content')

    <form method="POST" action="{{ route('clients.jobs.store') }}" enctype="multipart/form-data"
          class="bg-white p-6 rounded shadow-sm border max-w-2xl space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium mb-1">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="w-full border rounded p-2 text-sm">
            @error('title') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Description</label>
            <textarea name="description" rows="5" class="w-full border rounded p-2 text-sm">{{ old('description') }}</textarea>
            @error('description') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Category</label>
            <select name="category_id" class="w-full border rounded p-2 text-sm">
                <option value="">-- none --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex gap-4">
            <div class="flex-1">
                <label class="block text-sm font-medium mb-1">Budget (PKR)</label>
                <input type="number" step="0.01" name="budget" value="{{ old('budget') }}" class="w-full border rounded p-2 text-sm">
                @error('budget') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div class="flex-1">
                <label class="block text-sm font-medium mb-1">Deadline</label>
                <input type="date" name="deadline" value="{{ old('deadline') }}" class="w-full border rounded p-2 text-sm">
                @error('deadline') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Attachment (optional)</label>
            <input type="file" name="attachment" class="w-full border rounded p-2 text-sm">
            @error('attachment') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded text-sm">Post Job</button>
    </form>
@endsection
