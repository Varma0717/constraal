<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavigationMenu extends Model
{
    use HasFactory;

    protected $table = 'navigation_menu';

    protected $fillable = [
        'label',
        'url',
        'order',
        'parent_id',
        'is_visible',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];

    /** Relationships */
    public function children()
    {
        return $this->hasMany(NavigationMenu::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(NavigationMenu::class, 'parent_id');
    }

    /** Scopes */
    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    public function scopeTopLevel($query)
    {
        return $query->whereNull('parent_id');
    }
}
