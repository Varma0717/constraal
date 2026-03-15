<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockedIp extends Model
{
    use HasFactory;

    protected $table = 'blocked_ips';

    protected $fillable = [
        'ip_address',
        'reason',
        'blocked_until',
        'is_permanent',
    ];

    protected $casts = [
        'blocked_until' => 'datetime',
        'is_permanent' => 'boolean',
    ];

    /** Scopes */
    public function scopeActive($query)
    {
        return $query->where(function ($q) {
            $q->where('is_permanent', true)
                ->orWhere('blocked_until', '>', now());
        });
    }

    public function scopeExpired($query)
    {
        return $query->where('is_permanent', false)
            ->where('blocked_until', '<=', now());
    }

    /** Methods */
    public function isActive(): bool
    {
        if ($this->is_permanent) {
            return true;
        }
        return $this->blocked_until && $this->blocked_until->isFuture();
    }

    public function unblock()
    {
        $this->delete();
    }
}
