<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Job;
use App\Models\User;


class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'open_jobs' => Job::open()->count(),
            'total_jobs' => Job::count(),
            'applications_received' => Application::count(),
            'hired_count' => Application::where('status', 'hired')->count(),
            'clients' => User::where('role', 'client')->count(),
            'freelancers' => User::where('role', 'freelancer')->count(),
        ];

        $recentJobs = Job::with('client')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentJobs'));
    }
}
