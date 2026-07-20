<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FreelancerProfileController extends Controller
{
    public function edit(Request $request){

        $profile = $request->user()->profile;

        return view('profile.edit-freelancer', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'bio' => ['nullable', 'string', 'max:1000'],
            'skills' => ['nullable', 'string', 'max:255'],
            'resume' => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:5120'],
            'portfolio_image' => ['nullable', 'image', 'max:3072'],
        ]);

        $userId = $request->user()->id;
        $data = $request->only(['bio', 'skills']);

        if ($request->hasFile('resume')) {
            $data['resume_path'] = $request->file('resume')->store("uploads/{$userId}/resume", 'public');
        }

        if ($request->hasFile('portfolio_image')) {
            $data['portfolio_image_path'] = $request->file('portfolio_image')
                ->store("uploads/{$userId}/portfolio", 'public');
        }

        $request->user()->profile()->updateOrCreate(['user_id' => $userId], $data);

        return back()->with('success', 'Profile updated!');
    }
}
