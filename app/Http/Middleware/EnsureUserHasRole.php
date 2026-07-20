<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
     /*
     * Usage in routes: ->middleware('role:admin') or ->middleware('role:client,admin')
     */
    public function handle(Request $request, Closure $next, string $roles): Response
    {
        $allowed = explode(',', $roles);

        if (! $request->user() || ! in_array($request->user()->role, $allowed, true)) {
            abort(403, 'You are not authorized to access this page.');
        }

        return $next($request);
    }
}
