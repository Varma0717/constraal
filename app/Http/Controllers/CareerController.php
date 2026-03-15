<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Support\Facades\Log;
use Throwable;

class CareerController extends Controller
{
    public function index()
    {
        try {
            $jobs = Job::where('is_active', true)->get();
        } catch (Throwable $exception) {
            Log::warning('Careers page jobs query failed.', [
                'message' => $exception->getMessage(),
            ]);

            $jobs = (new Job())->newCollection();
        }

        return view('careers', compact('jobs'));
    }
}
