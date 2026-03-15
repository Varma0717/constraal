<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminPermission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'module',
    ];

    public $timestamps = true;

    /** Relationships */
    public function roles()
    {
        return $this->belongsToMany(AdminRole::class, 'admin_role_permission', 'admin_permission_id', 'admin_role_id');
    }

    /** Scopes */
    public function scopeByModule($query, $module)
    {
        return $query->where('module', $module);
    }
}
