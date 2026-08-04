@extends('layouts.dashboard')

@section('title', 'Edit Category')

@section('content')

    <form method="POST" action="{{ route('admin.categories.update', $category) }}"
          class="bg-white p-6 rounded shadow-sm border max-w-md space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium mb-1">Name</label>
            <input type="text" name="name" value="{{ old('name', $category->name) }}" class="w-full border rounded p-2 text-sm">
            @error('name') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded text-sm">Update</button>
    </form>

    <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" class="max-w-md mt-3"
          onsubmit="return confirm('Delete this category?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-600 text-sm hover:underline">Delete Category</button>
    </form>
@endsection
