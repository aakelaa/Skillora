<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AccountStatusUpdated;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    // GET /admin/users
    public function index(Request $request)
    {
        $users = User::where('role', '!=', 'admin')
            ->when($request->search, fn ($q) => $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%'))
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.users.index', compact('users'));
    }

    // GET /admin/users/create
    public function create()
    {
        return view('admin.users.create');
    }

    // POST /admin/users
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ]);

        $defaultPassword = 'client123';

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($defaultPassword),
            'role' => 'client',
            'status' => User::STATUS_APPROVED,
            'email_verified_at' => now(),
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', "Client account created.");
    }

    // GET /admin/users/{user}/edit
    public function edit(User $user)
    {
        abort_unless($user->role !== 'admin', 403, 'Only non-admin accounts can be managed here.');

        return view('admin.users.edit', compact('user'));
    }

    // PUT /admin/users/{user}
    public function update(Request $request, User $user)
    {
        abort_unless($user->role !== 'admin', 403);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'Account updated successfully.');
    }

    // DELETE /admin/users/{user}
    public function destroy(User $user)
    {
        abort_unless($user->role !== 'admin', 403, 'Admin accounts cannot be deleted here.');

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Account deleted.');
    }

    public function approve(User $user)
    {
        abort_unless($user->role !== 'admin', 403);

        $user->update(['status' => User::STATUS_APPROVED]);

        Mail::to($user)->send(new AccountStatusUpdated($user, User::STATUS_APPROVED));

        return redirect()->route('admin.users.index')->with('success', 'Account approved successfully.');
    }

    public function reject(User $user)
    {
        abort_unless($user->role !== 'admin', 403);

        $user->update(['status' => User::STATUS_REJECTED]);

        Mail::to($user)->send(new AccountStatusUpdated($user, User::STATUS_REJECTED));

        return redirect()->route('admin.users.index')->with('success', 'Account rejected successfully.');
    }
}
