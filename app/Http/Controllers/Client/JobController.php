<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobRequest;
use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class JobController extends Controller
{
    // GET /client/jobs
    public function index(Request $request)
    {
        $jobs = $request->user()->jobs()
            ->withCount('applications')
            ->latest()
            ->paginate(10);

        return view('client.jobs.index', compact('jobs'));
    }

    // GET /client/jobs/create
    public function create()
    {
        $categories = Category::all();

        return view('client.jobs.create', compact('categories'));
    }

    // POST /client/jobs
    public function store(StoreJobRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('attachment')) {
            // organize uploads by user-ID folder
            $data['attachment_path'] = $request->file('attachment')
                ->store("uploads/{$request->user()->id}/attachments", 'public');
        }

        $data['client_id'] = $request->user()->id;
        $data['status'] = 'open';

        Job::create($data);

        return redirect()->route('client.jobs.index')->with('success', 'Job posted successfully!');
    }

    // GET /client/jobs/{job}/edit
    public function edit(Job $job)
    {
        $this->authorizeOwner($job);

        $categories = Category::all();

        return view('client.jobs.edit', compact('job', 'categories'));
    }

    // PUT/PATCH /client/jobs/{job}
    public function update(StoreJobRequest $request, Job $job)
    {
        $this->authorizeOwner($job);

        $data = $request->validated();

        if ($request->hasFile('attachment')) {
            if ($job->attachment_path) {
                Storage::disk('public')->delete($job->attachment_path);
            }
            $data['attachment_path'] = $request->file('attachment')
                ->store("uploads/{$request->user()->id}/attachments", 'public');
        }

        $job->update($data);

        return redirect()->route('client.jobs.index')->with('success', 'Job updated successfully!');
    }

    // DELETE /client/jobs/{job}  (soft delete)
    public function destroy(Job $job)
    {
        $this->authorizeOwner($job);

        $job->delete(); // soft delete, row is preserved

        return redirect()->route('client.jobs.index')->with('success', 'Job deleted.');
    }

    private function authorizeOwner(Job $job)
    {
        abort_unless($job->client_id === auth()->id(), 403);
    }
}
