<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureFlag extends Model
{
    use HasFactory;

    protected $table = 'feature_flags';

    protected $fillable = [
        'name',
        'description',
        'is_enabled',
        'config',
    ];

    protected $casts = [
        'config' => 'array',
        'is_enabled' => 'boolean',
    ];

    /** Scopes */
    public function scopeEnabled($query)
    {
        return $query->where('is_enabled', true);
    }

    public function scopeDisabled($query)
    {
        return $query->where('is_enabled', false);
    }

    /** Methods */
    public function isEnabled(): bool
    {
        return $this->is_enabled;
    }

    public function enable()
    {
        $this->update(['is_enabled' => true]);
    }

    public function disable()
    {
        $this->update(['is_enabled' => false]);
    }
}
