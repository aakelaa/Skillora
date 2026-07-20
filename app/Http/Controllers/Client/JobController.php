<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index ()
    {
        $jobs = Job::all();
        return view ('jobs.index', compact('jobs'));
    }

    public function create ()
    {
        $categories = Category::all();
         return view ('jobs.create', compact('categories'));
    }

    public function store (Request $request)
    {
        $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'budget' => 'required|numeric|min:0',
        'deadline' => 'required|date',
        'attachment' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        'status' => 'required|string|max:50',
        'client_id' => 'required|exists:users,id',
]);

        $attachmentPath = null;

        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('attachments', 'public');
        }

        Job::create([
         'title'=> $request->title,
         'description'=> $request->description,
         'category_id'=> $request->category_id,
         'budget'=> $request->budget,
         'deadline'=> $request->deadline,
         'attachment'=> $attachmentPath,
         'status'=> $request->status,
         'client_id'=> $request->client_id,
        ]);

        return redirect()->route('jobs.index')->with('success', 'Job Added Successfully');
    }

    public function show (Job $job)
    {
        return view ('jobs.show', compact('job'));

    }

    public function edit (Job $job)
    {
        return view('jobs.edit', compact('job'));
    }

    public function update (Request $request, Job $job)
    {
         $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'budget' => 'required|numeric|min:0',
        'deadline' => 'required|date',
        'attachment' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        'status' => 'required|string|max:50',
        'client_id' => 'required|exists:users,id',
         ]);

         $attachmentPath = $job->attachment;

         if ($request->hasFile('attachment')) {
             $attachmentPath = $request->file('attachment')->store('attachments', 'public');
         }

         $job->update ([
        'title'=> $request->title,
         'description'=> $request->description,
         'category_id'=> $request->category_id,
         'budget'=> $request->budget,
         'deadline'=> $request->deadline,
         'attachment'=> $attachmentPath,
         'status'=> $request->status,
         'client_id'=> $request->client_id,
         ]);

         return redirect()->route('jobs.index')->with('success', 'Job Updated Successfully');
    }

    public function destroy (Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'Job Deleted Successfully');

    }
}
