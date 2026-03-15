<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CmsPage extends Model
{
    use SoftDeletes;

    protected $table = 'cms_pages';

    protected $fillable = [
        'title',
        'slug',
        'meta_description',
        'meta_keywords',
        'content',
        'hero_title',
        'hero_description',
        'hero_image',
        'hero_cta_text',
        'hero_cta_url',
        'status',
        'featured',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Scope to only published pages
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published')->whereNotNull('published_at');
    }

    /**
     * Scope for draft pages
     */
    public function scopeDrafts($query)
    {
        return $query->where('status', 'draft');
    }

    /**
     * Get route key
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
