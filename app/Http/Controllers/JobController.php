<?php

namespace App\Http\Controllers\Client;
use App\Models\Application;
use App\Models\Job;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobController extends Controller
{
      // GET /jobs
    public function index()
    {
        $jobs = Job::query()
            ->open()
            ->with(['client', 'category'])
            ->latest()
            ->paginate(10);

        $categories = Category::all();

        return view('jobs.index', compact('jobs', 'categories'));
    }

    // GET /jobs/{id}
    public function show(Job $job)
    {
        $job->load(['client', 'category', 'freelancers']);

        return view('jobs.show', compact('job'));
    }

    // POST /jobs/{id}/apply
    public function apply(ApplyToJobRequest $request, Job $job)
    {
        Application::updateOrCreate(
            ['job_id' => $job->id, 'freelancer_id' => $request->user()->id],
            ['cover_letter' => $request->validated()['cover_letter'], 'status' => 'pending']
        );

        return back()->with('success', 'Your application has been submitted!');
    }
}
