@extends('layouts.dashboard')

@section('title', 'Manage Clients')

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Manage accounts</h1>
            <p class="page-subtitle">Search, approve, and manage client and freelancer accounts.</p>
        </div>
        <div class="flex flex-col gap-3 sm:flex-row">
            <form method="GET" class="flex gap-2">
                <input type="text" name="search" placeholder="Search name or email..." value="{{ request('search') }}" class="!w-64" />
                <button type="submit" class="btn-secondary">Search</button>
            </form>
            <a href="{{ route('admin.users.create') }}" class="btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                Add Client
            </a>
        </div>
    </div>

    @if ($users->count())
        <div class="table-wrap">
            <div class="table-scroll">
                <table class="table-modern">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-primary-50 text-sm font-bold text-primary-600">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </span>
                                        <span class="font-semibold text-heading">{{ $user->name }}</span>
                                    </div>
                                </td>
                                <td class="text-paragraph">{{ $user->email }}</td>
                                <td class="text-paragraph">{{ ucfirst($user->role) }}</td>
                                <td>
                                    <span class="{{ $user->status === 'approved' ? 'badge-success' : ($user->status === 'pending' ? 'badge-warning' : 'badge-danger') }}">
                                        {{ ucfirst($user->status) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="row-actions justify-end">
                                        @if ($user->status === 'pending')
                                            <form method="POST" action="{{ route('admin.users.approve', $user) }}">
                                                @csrf @method('PUT')
                                                <button type="submit" class="action-btn-approve" title="Approve">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>
                                                </button>
                                            </form>
                                            <form method="POST" action="{{ route('admin.users.reject', $user) }}" onsubmit="return confirm('Reject this account request?');">
                                                @csrf @method('PUT')
                                                <button type="submit" class="action-btn-delete" title="Reject">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
                                                </button>
                                            </form>
                                        @elseif ($user->status === 'rejected')
                                            <form method="POST" action="{{ route('admin.users.approve', $user) }}">
                                                @csrf @method('PUT')
                                                <button type="submit" class="action-btn-approve" title="Approve">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>
                                                </button>
                                            </form>
                                        @endif
                                        <a href="{{ route('admin.users.edit', $user) }}" class="action-btn-edit" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" /></svg>
                                        </a>
                                        <form method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Delete this user?');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="action-btn-delete" title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-6">{{ $users->links() }}</div>
    @else
        <div class="empty-state">
            <div class="empty-state-icon">👥</div>
            <p class="font-semibold text-heading">No accounts yet</p>
            <p class="text-sm text-paragraph">Approved clients and freelancers will appear here.</p>
        </div>
    @endif
@endsection
