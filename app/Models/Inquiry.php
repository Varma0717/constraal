<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = ['name', 'email', 'type', 'message', 'status', 'metadata'];

    protected $casts = [
        'metadata' => 'array',
    ];
}
