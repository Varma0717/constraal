<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriber extends Model
{
    use SoftDeletes;

    protected $table = 'subscribers';

    protected $fillable = [
        'email',
        'name',
        'source',
        'interest_category',
        'investor_interest',
        'industrial_partner',
        'verified_at',
        'unsubscribed_at',
    ];

    protected $casts = [
        'investor_interest' => 'boolean',
        'industrial_partner' => 'boolean',
        'verified_at' => 'datetime',
        'unsubscribed_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Scope to active subscribers only
     */
    public function scopeActive($query)
    {
        return $query->whereNull('unsubscribed_at');
    }

    /**
     * Scope verified subscribers
     */
    public function scopeVerified($query)
    {
        return $query->whereNotNull('verified_at');
    }

    /**
     * Mark as verified
     */
    public function verify()
    {
        return $this->update(['verified_at' => now()]);
    }

    /**
     * Unsubscribe
     */
    public function unsubscribe()
    {
        return $this->update(['unsubscribed_at' => now()]);
    }
}
