<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Job;

class JobApplication extends Model
{
    protected $fillable = ['job_id', 'name', 'email', 'cover_letter', 'resume_path', 'status'];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
