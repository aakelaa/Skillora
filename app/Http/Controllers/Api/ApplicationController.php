<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    // GET /api/applications  (freelancer sees own, client sees applications to their jobs)
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->isFreelancer()) {
            $applications = $user->applications()->with('job')->paginate(15);
        } elseif ($user->isClient()) {
            $applications = Application::whereHas('job', fn ($q) => $q->where('client_id', $user->id))
                ->with(['job', 'freelancer:id,name'])
                ->paginate(15);
        } else {
            $applications = Application::with(['job', 'freelancer:id,name'])->paginate(15);
        }

        return response()->json($applications);
    }

    // POST /api/applications
    public function store(Request $request)
    {
        abort_unless($request->user()->isFreelancer(), 403);

        $data = $request->validate([
            'job_id' => ['required', 'exists:jobs,id'],
            'cover_letter' => ['required', 'string', 'min:30'],
        ]);
        $data['freelancer_id'] = $request->user()->id;

        $application = Application::create($data);

        return response()->json($application, 201);
    }

    // GET /api/applications/{application}
    public function show(Application $application)
    {
        return response()->json($application->load(['job', 'freelancer:id,name']));
    }

    // PUT /api/applications/{application}  (client updates status: hired/rejected)
    public function update(Request $request, Application $application)
    {
        $application->load('job');
        abort_unless($application->job->client_id === $request->user()->id, 403);

        $data = $request->validate(['status' => ['required', 'in:pending,hired,rejected']]);
        $application->update($data);

        if ($data['status'] === 'hired') {
            $application->job->update(['status' => 'hired']);
        }

        return response()->json($application);
    }

    // DELETE /api/applications/{application}
    public function destroy(Request $request, Application $application)
    {
        abort_unless($application->freelancer_id === $request->user()->id, 403);

        $application->delete();

        return response()->json(['message' => 'Application withdrawn']);
    }
}
