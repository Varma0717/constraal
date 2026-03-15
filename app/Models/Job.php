<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\JobApplication;

class Job extends Model
{
    protected $fillable = ['title', 'location', 'category', 'type', 'description', 'remote', 'is_active'];

    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }
}
