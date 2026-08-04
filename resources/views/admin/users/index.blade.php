@extends('layouts.dashboard')

@section('title', 'Manage Clients')

@section('content')

    <div class="flex justify-between items-center mb-6">
        <form method="GET" class="flex gap-3">
            <input type="text" name="search" placeholder="Search name or email..." value="{{ request('search') }}"
                   class="border rounded p-2 text-sm w-64">
            <button type="submit" class="bg-gray-100 border px-4 py-2 rounded text-sm">Search</button>
        </form>

        <a href="{{ route('admin.users.create') }}"
           class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2.5 rounded-lg text-sm font-medium">
            + Add Client
        </a>
    </div>

    <div class="bg-white rounded-xl border overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-500 text-left">
                <tr>
                    <th class="px-5 py-3 font-medium">Name</th>
                    <th class="px-5 py-3 font-medium">Email</th>
                    <th class="px-5 py-3 font-medium">Joined</th>
                    <th class="px-5 py-3 font-medium">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($users as $user)
                    <tr>
                        <td class="px-5 py-3 font-medium text-gray-900">{{ $user->name }}</td>
                        <td class="px-5 py-3 text-gray-600">{{ $user->email }}</td>
                        <td class="px-5 py-3 text-gray-500">{{ $user->created_at->format('M d, Y') }}</td>
                        <td class="px-5 py-3">
                            <a href="{{ route('admin.users.edit', $user) }}" class="text-indigo-600 hover:underline">Edit</a>
                            <span class="text-gray-300">/</span>
                            <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="inline"
                                  onsubmit="return confirm('Delete this client? This will also remove their jobs.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-5 py-6 text-center text-gray-500">No clients yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $users->links() }}</div>

@endsection
