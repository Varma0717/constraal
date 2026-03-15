<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingPlan extends Model
{
    use HasFactory;

    protected $table = 'billing_plans';

    protected $fillable = [
        'name',
        'description',
        'price',
        'currency',
        'billing_period',
        'features',
        'is_active',
    ];

    protected $casts = [
        'features' => 'array',
        'is_active' => 'boolean',
        'price' => 'float',
    ];

    /** Relationships */
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    /** Scopes */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeMonthly($query)
    {
        return $query->where('billing_period', 'monthly');
    }

    public function scopeAnnual($query)
    {
        return $query->where('billing_period', 'annual');
    }
}
