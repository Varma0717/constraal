<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobApplicationReceived;

class JobApplicationController extends Controller
{
    public function create(Job $job)
    {
        return view('jobs.apply', compact('job'));
    }

    public function store(Request $request, Job $job)
    {
        // simple honeypot spam protection
        if ($request->filled('hp_name')) {
            return redirect()->route('careers')->with('status', 'Application submitted.');
        }

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'cover_letter' => 'nullable|string',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        $path = null;
        if ($request->hasFile('resume')) {
            $path = $request->file('resume')->store('resumes');
        }

        $application = JobApplication::create([
            'job_id' => $job->id,
            'name' => $data['name'],
            'email' => $data['email'],
            'cover_letter' => $data['cover_letter'] ?? null,
            'resume_path' => $path,
            'status' => 'New',
        ]);

        // Notify admin via email
        try {
            Mail::to(config('mail.from.address', env('ADMIN_EMAIL', 'admin@constraal.example')))
                ->send(new JobApplicationReceived($application));
        } catch (\Exception $e) {
            // swallow for now - logging could be added
        }

        return redirect()->route('careers')->with('status', 'Application submitted. Thank you.');
    }
}
