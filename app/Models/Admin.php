<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'last_login_at',
        'last_login_ip',
        'is_active',
        'failed_login_attempts',
        'locked_until',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'locked_until' => 'datetime',
        'is_active' => 'boolean',
    ];

    /** Relationships */
    public function roles()
    {
        return $this->belongsToMany(AdminRole::class, 'admin_admin_role', 'admin_id', 'admin_role_id');
    }

    /**
     * Get all permissions through the admin's roles
     */
    public function getPermissionsAttribute()
    {
        return $this->roles->flatMap(function ($role) {
            return $role->permissions;
        })->unique('id');
    }

    public function activityLogs()
    {
        return $this->hasMany(AdminActivityLog::class);
    }

    public function apiKeys()
    {
        return $this->hasMany(ApiKey::class);
    }

    public function mediaFiles()
    {
        return $this->hasMany(MediaFile::class);
    }

    public function supportTicketsAssigned()
    {
        return $this->hasMany(SupportTicket::class, 'assigned_to');
    }

    /** Scopes */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeLocked($query)
    {
        return $query->where('locked_until', '>', now());
    }

    /** Methods */
    public function hasPermission($permission): bool
    {
        // Check if any of the admin's roles have this permission
        return $this->roles()->whereHas('permissions', function ($query) use ($permission) {
            $query->where('admin_permissions.name', $permission);
        })->exists();
    }

    public function hasRole($role): bool
    {
        return $this->roles()->where('admin_roles.name', $role)->exists();
    }

    public function isLocked(): bool
    {
        return $this->locked_until && $this->locked_until->isFuture();
    }

    public function lock($minutes = 30)
    {
        $this->update(['locked_until' => now()->addMinutes($minutes)]);
    }

    public function unlock()
    {
        $this->update([
            'locked_until' => null,
            'failed_login_attempts' => 0,
        ]);
    }

    public function recordFailedLogin()
    {
        $attempts = $this->failed_login_attempts + 1;
        $this->update(['failed_login_attempts' => $attempts]);

        if ($attempts >= 5) {
            $this->lock();
        }
    }

    public function recordSuccessfulLogin($ip)
    {
        $this->update([
            'last_login_at' => now(),
            'last_login_ip' => $ip,
            'failed_login_attempts' => 0,
            'locked_until' => null,
        ]);
    }
}
