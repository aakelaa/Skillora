<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class DashboardRedirectController extends Controller
{

    public function __invoke(Request $request)
    {
        return match ($request->user()->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'client' => redirect()->route('clients.dashboard'),
            'freelancer' => redirect()->route('freelancer.dashboard'),
            default => redirect()->route('jobs.index'),
        };
    }
}
