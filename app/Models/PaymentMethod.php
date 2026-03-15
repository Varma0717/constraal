<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'token',
        'card_last_four',
        'card_holder',
        'expiry',
        'details',
        'is_default',
    ];

    protected $casts = [
        'details' => 'array',
        'is_default' => 'boolean',
    ];

    /** Relationships */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /** Scopes */
    public function scopeDefault($query)
    {
        return $query->where('is_default', true);
    }

    /** Methods */
    public function markAsDefault()
    {
        // Unmark all other payment methods for this user
        PaymentMethod::where('user_id', $this->user_id)
            ->where('id', '!=', $this->id)
            ->update(['is_default' => false]);

        $this->update(['is_default' => true]);
    }
}
