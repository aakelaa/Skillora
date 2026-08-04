<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $stats = [
            'active_jobs' => $user->jobs()->open()->count(),
            'applications_received' => Application::whereHas(
                'job', fn ($q) => $q->where('client_id', $user->id)
            )->count(),
            'hired_count' => Application::whereHas(
                'job', fn ($q) => $q->where('client_id', $user->id)
            )->where('status', 'hired')->count(),
        ];

        $jobs = $user->jobs()->withCount('applications')->latest()->take(5)->get();

        return view('clients.dashboard', compact('stats', 'jobs'));
    }
}
