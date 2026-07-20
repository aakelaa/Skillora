<?php

namespace App\Http\Controllers\Freelancer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();

        $stats = [
            'total_applications' => $user->applications()->count(),
            'pending' => $user->applications()->where('status', 'pending')->count(),
            'hired' => $user->applications()->where('status', 'hired')->count(),
            'rejected' => $user->applications()->where('status', 'rejected')->count(),
        ];

        $recentApplications = $user->applications()->with('job')->latest()->take(5)->get();

        return view('freelancer.dashboard', compact('stats', 'recentApplications'));
    }
}
