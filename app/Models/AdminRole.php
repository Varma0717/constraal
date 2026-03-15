<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    /** Relationships */
    public function permissions()
    {
        return $this->belongsToMany(AdminPermission::class, 'admin_role_permission', 'admin_role_id', 'admin_permission_id');
    }

    public function admins()
    {
        return $this->belongsToMany(Admin::class, 'admin_admin_role', 'admin_role_id', 'admin_id');
    }

    /** Methods */
    public function grantPermission($permission)
    {
        if (is_string($permission)) {
            $permission = AdminPermission::where('name', $permission)->firstOrFail();
        }
        $this->permissions()->attach($permission);
    }

    public function revokePermission($permission)
    {
        if (is_string($permission)) {
            $permission = AdminPermission::where('name', $permission)->firstOrFail();
        }
        $this->permissions()->detach($permission);
    }
}
