<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiKey extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'name',
        'key',
        'permissions',
        'last_used_at',
        'is_active',
    ];

    protected $casts = [
        'permissions' => 'array',
        'last_used_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    /** Relationships */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    /** Scopes */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /** Methods */
    public function hasPermission($permission): bool
    {
        return in_array($permission, $this->permissions ?? []);
    }

    public function recordUsage()
    {
        $this->update(['last_used_at' => now()]);
    }

    public function revoke()
    {
        $this->update(['is_active' => false]);
    }
}
