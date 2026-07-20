<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $stats = [
            'total_jobs' => $user->jobs()->count(),
            'open_jobs' => $user->jobs()->open()->count(),
            'applications_received' => \App\Models\Application::whereHas(
                'job', fn ($q) => $q->where('client_id', $user->id)
            )->count(),
            'hired_count' => \App\Models\Application::whereHas(
                'job', fn ($q) => $q->where('client_id', $user->id)
            )->where('status', 'hired')->count(),
        ];

        $recentJobs = $user->jobs()->withCount('applications')->latest()->take(5)->get();

        return view('client.dashboard', compact('stats', 'recentJobs'));
    }
}
