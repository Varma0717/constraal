<?php

namespace Database\Seeders;

use App\Models\AdminRole;
use App\Models\AdminPermission;
use Illuminate\Database\Seeder;

class AdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions
        $permissions = [
            // User Management
            ['name' => 'manage_users', 'description' => 'Manage users', 'module' => 'users'],
            ['name' => 'view_users', 'description' => 'View users', 'module' => 'users'],
            ['name' => 'edit_users', 'description' => 'Edit users', 'module' => 'users'],
            ['name' => 'delete_users', 'description' => 'Delete users', 'module' => 'users'],

            // Admin Management
            ['name' => 'manage_admins', 'description' => 'Manage admin accounts', 'module' => 'admins'],
            ['name' => 'view_admins', 'description' => 'View admin accounts', 'module' => 'admins'],
            ['name' => 'edit_admins', 'description' => 'Edit admin accounts', 'module' => 'admins'],
            ['name' => 'delete_admins', 'description' => 'Delete admin accounts', 'module' => 'admins'],

            // Billing Management
            ['name' => 'manage_billing', 'description' => 'Manage billing', 'module' => 'billing'],
            ['name' => 'view_subscriptions', 'description' => 'View subscriptions', 'module' => 'billing'],
            ['name' => 'manage_subscriptions', 'description' => 'Manage subscriptions', 'module' => 'billing'],
            ['name' => 'view_payments', 'description' => 'View payments', 'module' => 'billing'],
            ['name' => 'manage_payments', 'description' => 'Manage payments', 'module' => 'billing'],
            ['name' => 'manage_billing_plans', 'description' => 'Manage billing plans', 'module' => 'billing'],

            // CMS Management
            ['name' => 'manage_cms', 'description' => 'Manage CMS', 'module' => 'cms'],
            ['name' => 'view_cms', 'description' => 'View CMS', 'module' => 'cms'],
            ['name' => 'edit_cms', 'description' => 'Edit CMS', 'module' => 'cms'],
            ['name' => 'delete_cms', 'description' => 'Delete CMS', 'module' => 'cms'],

            // Media Management
            ['name' => 'manage_media', 'description' => 'Manage media files', 'module' => 'media'],
            ['name' => 'view_media', 'description' => 'View media files', 'module' => 'media'],
            ['name' => 'upload_media', 'description' => 'Upload media files', 'module' => 'media'],
            ['name' => 'delete_media', 'description' => 'Delete media files', 'module' => 'media'],

            // Security Management
            ['name' => 'manage_security', 'description' => 'Manage security', 'module' => 'security'],
            ['name' => 'view_security', 'description' => 'View security', 'module' => 'security'],
            ['name' => 'view_logs', 'description' => 'View logs', 'module' => 'security'],
            ['name' => 'manage_logs', 'description' => 'Manage logs', 'module' => 'security'],

            // Systems
            ['name' => 'view_infrastructure', 'description' => 'View infrastructure', 'module' => 'infrastructure'],
            ['name' => 'manage_infrastructure', 'description' => 'Manage infrastructure', 'module' => 'infrastructure'],

            // Analytics
            ['name' => 'view_analytics', 'description' => 'View analytics', 'module' => 'analytics'],

            // API Management
            ['name' => 'manage_api', 'description' => 'Manage API keys', 'module' => 'api'],

            // Settings
            ['name' => 'manage_settings', 'description' => 'Manage settings', 'module' => 'settings'],
            ['name' => 'view_settings', 'description' => 'View settings', 'module' => 'settings'],
        ];

        foreach ($permissions as $permission) {
            AdminPermission::updateOrCreate(
                ['name' => $permission['name']],
                $permission
            );
        }

        // Create roles
        $superAdminRole = AdminRole::updateOrCreate(
            ['name' => 'Super Admin'],
            ['description' => 'Full system access']
        );

        $adminRole = AdminRole::updateOrCreate(
            ['name' => 'Admin'],
            ['description' => 'Administrator with most permissions']
        );

        $billingAdminRole = AdminRole::updateOrCreate(
            ['name' => 'Billing Admin'],
            ['description' => 'Manage billing and subscriptions']
        );

        $contentAdminRole = AdminRole::updateOrCreate(
            ['name' => 'Content Admin'],
            ['description' => 'Manage content and CMS']
        );

        $supportAdminRole = AdminRole::updateOrCreate(
            ['name' => 'Support Admin'],
            ['description' => 'Handle customer support']
        );

        $securityAdminRole = AdminRole::updateOrCreate(
            ['name' => 'Security Admin'],
            ['description' => 'Manage security and logs']
        );

        // Assign permissions to Super Admin (all permissions)
        $superAdminRole->permissions()->sync(
            AdminPermission::pluck('id')->toArray()
        );

        // Assign permissions to Admin
        $adminPermissions = AdminPermission::whereIn('name', [
            'manage_users',
            'view_users',
            'edit_users',
            'view_admins',
            'view_subscriptions',
            'view_payments',
            'manage_cms',
            'view_cms',
            'edit_cms',
            'manage_media',
            'upload_media',
            'view_security',
            'view_logs',
            'view_analytics',
        ])->pluck('id')->toArray();

        $adminRole->permissions()->sync($adminPermissions);

        // Assign permissions to Billing Admin
        $billingPermissions = AdminPermission::whereIn('name', [
            'view_subscriptions',
            'manage_subscriptions',
            'view_payments',
            'manage_payments',
            'manage_billing_plans',
            'manage_billing',
        ])->pluck('id')->toArray();

        $billingAdminRole->permissions()->sync($billingPermissions);

        // Assign permissions to Content Admin
        $contentPermissions = AdminPermission::whereIn('name', [
            'manage_cms',
            'view_cms',
            'edit_cms',
            'delete_cms',
            'manage_media',
            'upload_media',
            'delete_media',
        ])->pluck('id')->toArray();

        $contentAdminRole->permissions()->sync($contentPermissions);

        // Assign permissions to Support Admin
        $supportPermissions = AdminPermission::whereIn('name', [
            'view_users',
            'view_subscriptions',
        ])->pluck('id')->toArray();

        $supportAdminRole->permissions()->sync($supportPermissions);

        // Assign permissions to Security Admin
        $securityPermissions = AdminPermission::whereIn('name', [
            'manage_security',
            'view_security',
            'manage_logs',
            'view_logs',
        ])->pluck('id')->toArray();

        $securityAdminRole->permissions()->sync($securityPermissions);
    }
}
