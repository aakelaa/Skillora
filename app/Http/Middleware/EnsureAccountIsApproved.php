<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureAccountIsApproved
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user || $user->isAdmin() || $user->status === 'approved') {
            return $next($request);
        }

        Auth::logout();

        $message = $user->status === 'rejected'
            ? 'Your account request has been rejected. Please contact support for help.'
            : 'Your account is still pending approval. Please check your email for updates.';

        return redirect()->route('login')->with('status', $message);
    }
}
