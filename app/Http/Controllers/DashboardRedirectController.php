<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DashboardRedirectController extends Controller
{
    // GET /dashboard  -> sends each role to its own dashboard
    public function __invoke(Request $request): RedirectResponse
    {
        return match ($request->user()->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'client' => redirect()->route('client.dashboard'),
            'freelancer' => redirect()->route('freelancer.dashboard'),
            default => redirect()->route('jobs.index'),
        };
    }
}
