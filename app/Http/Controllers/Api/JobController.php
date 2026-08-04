<?php

namespace App\Http\Controllers\Api;
use App\Models\Job;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::open()
        ->with(['client:id, name', 'category:id, name'])
        ->paginate(15);

        return response()->json($jobs);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'category-id' => 'nullable|exists:category_id',
        'budget' => 'required|numeric',

        ]);

        $data['client_id'] = $request->user()->id;
        $data['status'] = 'open';

        $job = Job::create ($data);
        return response()->json($job, 201);
    }

    public function show (Job $job)
    {
        return response()->json($job->load(['client:id', 'category:id,name', 'freelancers:id,name']));
    }

    public function update (Request $request, Job $job)
    {
       abort_unless($job->client_id === $request->user()->id, 403);

        $job->update($request->validated());
        return response()->json($job);

    }

    public function destroy (Request $request, Job $job)
    {
        abort_unless($job->client_id === $request->user()->id, 403);

        $job->delete();

        return response()->json(['message' => 'Job Deleted']);


    }
}
