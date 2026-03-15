<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    public function download(JobApplication $application)
    {
        if (! $application->resume_path) {
            abort(404);
        }
        return Storage::download($application->resume_path, $application->name . '-resume');
    }
}
