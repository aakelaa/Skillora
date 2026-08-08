@extends('layouts.dashboard')

@section('title', 'Manage Clients')

@section('content')

    <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-semibold text-heading">Manage accounts</h1>
            <p class="text-sm text-paragraph">Search, approve, and manage client and freelancer accounts.</p>
        </div>
        <div class="flex flex-col gap-3 sm:flex-row">
            <form method="GET" class="flex gap-3">
                <input type="text" name="search" placeholder="Search name or email..." value="{{ request('search') }}" class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 focus:border-primary focus:ring-primary/10" />
                <button type="submit" class="btn-secondary rounded-2xl px-5 py-3">Search</button>
            </form>
            <a href="{{ route('admin.users.create') }}" class="btn-primary inline-flex items-center justify-center px-5 py-3 text-sm">+ Add Client</a>
        </div>
    </div>

    <div class="overflow-hidden rounded-[32px] border border-slate-200 bg-white shadow-card">
        <table class="min-w-full text-sm">
            <thead class="bg-slate-50 text-left text-sm uppercase tracking-[0.18em] text-muted">
                <tr>
                    <th class="px-6 py-4">Name</th>
                    <th class="px-6 py-4">Email</th>
                    <th class="px-6 py-4">Role</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($users as $user)
                    <tr>
                        <td class="px-6 py-4 font-medium text-heading">{{ $user->name }}</td>
                        <td class="px-6 py-4 text-paragraph">{{ $user->email }}</td>
                        <td class="px-6 py-4 text-paragraph">{{ ucfirst($user->role) }}</td>
                        <td class="px-6 py-4">
                            <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $user->status === 'approved' ? 'bg-green-100 text-green-700' : ($user->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') }}">
                                {{ ucfirst($user->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 space-x-3 text-sm">
                            <a href="{{ route('admin.users.edit', $user) }}" class="text-primary hover:underline">Edit</a>
                            <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="inline" onsubmit="return confirm('Delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                            @if ($user->status === 'pending')
                                <form method="POST" action="{{ route('admin.users.approve', $user) }}" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="text-green-600 hover:underline">Approve</button>
                                </form>
                                <form method="POST" action="{{ route('admin.users.reject', $user) }}" class="inline" onsubmit="return confirm('Reject this account request?');">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="text-red-600 hover:underline">Reject</button>
                                </form>
                            @elseif ($user->status === 'rejected')
                                <form method="POST" action="{{ route('admin.users.approve', $user) }}" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="text-green-600 hover:underline">Approve</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-6 py-8 text-center text-paragraph">No accounts yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $users->links() }}</div>

@endsection
