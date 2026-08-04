<?php

namespace App\Http\Controllers\Freelancer;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $stats = [
            'active_applications' => $user->applications()->where('status', 'pending')->count(),
            'hired' => $user->applications()->where('status', 'hired')->count(),
            'new_matches' => Job::open()->where('created_at', '>=', now()->subDays(7))->count(),
        ];

        $recentApplications = $user->applications()->with('job')->latest()->take(5)->get();

        $recommendedJobs = Job::open()
            ->whereNotIn('id', $user->applications()->pluck('job_id'))
            ->with('client', 'category')
            ->latest()
            ->take(3)
            ->get();

        return view('freelancer.dashboard', compact('stats', 'recentApplications', 'recommendedJobs'));
    }

    // GET /freelancer/applications
    public function applications(Request $request)
    {
        $applications = $request->user()->applications()
            ->with('job')
            ->latest()
            ->paginate(10);

        return view('freelancer.applications', compact('applications'));
    }
}
