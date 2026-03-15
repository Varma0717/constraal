<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'billing_plan_id',
        'status',
        'started_at',
        'expires_at',
        'renewed_at',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'expires_at' => 'datetime',
        'renewed_at' => 'datetime',
    ];

    /** Relationships */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(BillingPlan::class, 'billing_plan_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    /** Scopes */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeExpired($query)
    {
        return $query->where('expires_at', '<=', now());
    }

    public function scopeExpiring($query, $days = 7)
    {
        return $query->whereBetween('expires_at', [now(), now()->addDays($days)]);
    }

    /** Methods */
    public function isActive(): bool
    {
        return $this->status === 'active' && (!$this->expires_at || $this->expires_at->isFuture());
    }

    public function cancel()
    {
        $this->update([
            'status' => 'cancelled',
            'expires_at' => now(),
        ]);
    }

    public function renew($plan = null)
    {
        if ($plan) {
            $this->billing_plan_id = $plan->id;
        }
        $this->update([
            'status' => 'active',
            'renewed_at' => now(),
            'expires_at' => now()->addMonths(
                $this->plan->billing_period === 'monthly' ? 1 : 12
            ),
        ]);
    }
}
