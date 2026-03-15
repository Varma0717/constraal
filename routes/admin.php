<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\AdminManagementController;
use App\Http\Controllers\Admin\BillingController;
use App\Http\Controllers\Admin\SecurityController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\NavigationController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\EmailTemplateController;
use App\Http\Controllers\Admin\AnalyticsController;
use App\Http\Controllers\Admin\ApiKeyController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\InfrastructureController;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\CmsPageController;
use App\Http\Controllers\Admin\SubscriberController;

// Admin Authentication Routes (Guest Only)
Route::middleware(['guest:admin'])->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.post');
    Route::get('/password-reset', [AdminAuthController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password-reset', [AdminAuthController::class, 'resetPassword'])->name('password.reset.post');
    Route::get('/password-reset/confirm', [AdminAuthController::class, 'showConfirmResetForm'])->name('password.reset.confirm');
    Route::post('/password-reset/confirm', [AdminAuthController::class, 'confirmResetPassword'])->name('password.reset.confirm.post');
});

// Admin Dashboard Routes (Authenticated Only)
Route::middleware(['admin.auth'])->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Logout
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Confirm Password
    Route::get('/confirm-password', [AdminAuthController::class, 'showConfirmPassword'])->name('password.confirm');
    Route::post('/confirm-password', [AdminAuthController::class, 'confirmPassword'])->name('password.confirm.post');

    // User Management
    Route::resource('users', UserManagementController::class)->names([
        'index' => 'users.index',
        'create' => 'users.create',
        'store' => 'users.store',
        'show' => 'users.show',
        'edit' => 'users.edit',
        'update' => 'users.update',
        'destroy' => 'users.destroy',
    ])->middleware('admin.permission:manage_users');

    // Jobs
    Route::get('/jobs', [AdminController::class, 'jobs'])->name('jobs');
    Route::get('/jobs/create', [AdminController::class, 'jobsCreate'])->name('jobs.create');
    Route::post('/jobs', [AdminController::class, 'jobsStore'])->name('jobs.store');
    Route::get('/jobs/{job}/edit', [AdminController::class, 'jobsEdit'])->name('jobs.edit');
    Route::put('/jobs/{job}', [AdminController::class, 'jobsUpdate'])->name('jobs.update');
    Route::delete('/jobs/{job}', [AdminController::class, 'jobsDestroy'])->name('jobs.destroy');

    // Applications
    Route::get('/applications', [AdminController::class, 'applications'])->name('applications');

    // Inquiries
    Route::get('/inquiries', [AdminController::class, 'inquiries'])->name('inquiries');

    // Pages
    Route::get('/pages', [AdminController::class, 'pages'])->name('pages');
    Route::get('/pages/create', [AdminController::class, 'pagesCreate'])->name('pages.create');
    Route::post('/pages', [AdminController::class, 'pagesStore'])->name('pages.store');
    Route::get('/pages/{page}/edit', [AdminController::class, 'pagesEdit'])->name('pages.edit');
    Route::put('/pages/{page}', [AdminController::class, 'pagesUpdate'])->name('pages.update');
    Route::delete('/pages/{page}', [AdminController::class, 'pagesDestroy'])->name('pages.destroy');

    // Admin Management
    Route::resource('admins', AdminManagementController::class)->names([
        'index' => 'admins.index',
        'create' => 'admins.create',
        'store' => 'admins.store',
        'show' => 'admins.show',
        'edit' => 'admins.edit',
        'update' => 'admins.update',
        'destroy' => 'admins.destroy',
    ])->middleware('admin.permission:manage_admins');

    // Billing Management
    Route::prefix('billing')->name('billing.')->group(function () {
        Route::get('/', [BillingController::class, 'index'])->name('index')->middleware('admin.permission:manage_billing');
        Route::get('/subscriptions', [BillingController::class, 'subscriptions'])->name('subscriptions')->middleware('admin.permission:view_subscriptions');
        Route::get('/payments', [BillingController::class, 'payments'])->name('payments')->middleware('admin.permission:view_payments');
        Route::get('/plans', [BillingController::class, 'plans'])->name('plans')->middleware('admin.permission:manage_billing_plans');
        Route::get('/plans/create', [BillingController::class, 'createPlan'])->name('plans.create')->middleware('admin.permission:manage_billing_plans');
        Route::post('/plans', [BillingController::class, 'storePlan'])->name('plans.store')->middleware('admin.permission:manage_billing_plans');
    });

    // Security Management
    Route::prefix('security')->name('security.')->group(function () {
        Route::get('/', [SecurityController::class, 'index'])->name('index')->middleware('admin.permission:view_security');
        Route::get('/login-attempts', [SecurityController::class, 'loginAttempts'])->name('login-attempts')->middleware('admin.permission:view_logs');
        Route::get('/blocked-ips', [SecurityController::class, 'blockedIps'])->name('blocked-ips')->middleware('admin.permission:manage_security');
        Route::post('/blocked-ips', [SecurityController::class, 'blockIp'])->name('block-ip')->middleware('admin.permission:manage_security');
        Route::delete('/blocked-ips/{ip}', [SecurityController::class, 'unblockIp'])->name('unblock-ip')->middleware('admin.permission:manage_security');
    });

    // Media Management
    Route::resource('media', MediaController::class)->names([
        'index' => 'media.index',
        'store' => 'media.store',
        'destroy' => 'media.destroy',
    ])->middleware('admin.permission:manage_media');

    // Settings
    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/', [SettingsController::class, 'index'])->name('index')->middleware('admin.permission:manage_settings');
        Route::post('/', [SettingsController::class, 'update'])->name('update')->middleware('admin.permission:manage_settings');
        Route::get('/feature-flags', [SettingsController::class, 'featureFlags'])->name('feature-flags')->middleware('admin.permission:manage_settings');
        Route::post('/feature-flags', [SettingsController::class, 'storeFeatureFlag'])->name('feature-flags.store')->middleware('admin.permission:manage_settings');
        Route::post('/feature-flags/{flag}/toggle', [SettingsController::class, 'toggleFeatureFlag'])->name('toggle-flag')->middleware('admin.permission:manage_settings');
        Route::delete('/feature-flags/{flag}', [SettingsController::class, 'destroyFeatureFlag'])->name('feature-flags.destroy')->middleware('admin.permission:manage_settings');
    });

    // Navigation Management
    Route::resource('navigation', NavigationController::class)->names([
        'index' => 'navigation.index',
        'create' => 'navigation.create',
        'store' => 'navigation.store',
        'edit' => 'navigation.edit',
        'update' => 'navigation.update',
        'destroy' => 'navigation.destroy',
    ])->middleware('admin.permission:manage_cms');
    Route::post('/navigation/reorder', [NavigationController::class, 'reorder'])->name('navigation.reorder')->middleware('admin.permission:manage_cms');

    // Announcements Management
    Route::resource('announcements', AnnouncementController::class)->names([
        'index' => 'announcements.index',
        'create' => 'announcements.create',
        'store' => 'announcements.store',
        'edit' => 'announcements.edit',
        'update' => 'announcements.update',
        'destroy' => 'announcements.destroy',
    ])->middleware('admin.permission:manage_cms');

    // Email Templates Management
    Route::resource('email-templates', EmailTemplateController::class)->names([
        'index' => 'email-templates.index',
        'create' => 'email-templates.create',
        'store' => 'email-templates.store',
        'edit' => 'email-templates.edit',
        'update' => 'email-templates.update',
        'destroy' => 'email-templates.destroy',
    ])->middleware('admin.permission:manage_settings');
    Route::get('/email-templates/{email_template}/preview', [EmailTemplateController::class, 'preview'])->name('email-templates.preview')->middleware('admin.permission:manage_settings');

    // Analytics
    Route::prefix('analytics')->name('analytics.')->group(function () {
        Route::get('/', [AnalyticsController::class, 'index'])->name('index');
        Route::get('/users', [AnalyticsController::class, 'users'])->name('users');
        Route::get('/revenue', [AnalyticsController::class, 'revenue'])->name('revenue');
    });

    // API Keys Management
    Route::resource('api-keys', ApiKeyController::class)->names([
        'index' => 'api-keys.index',
        'create' => 'api-keys.create',
        'store' => 'api-keys.store',
        'show' => 'api-keys.show',
        'edit' => 'api-keys.edit',
        'update' => 'api-keys.update',
        'destroy' => 'api-keys.destroy',
    ])->middleware('admin.permission:manage_settings');
    Route::post('/api-keys/{api_key}/revoke', [ApiKeyController::class, 'revoke'])->name('api-keys.revoke')->middleware('admin.permission:manage_settings');

    // Contact Messages
    Route::prefix('contact-messages')->name('contact-messages.')->group(function () {
        Route::get('/', [ContactMessageController::class, 'index'])->name('index');
        Route::get('/{contact_message}', [ContactMessageController::class, 'show'])->name('show');
        Route::post('/{contact_message}/mark-read', [ContactMessageController::class, 'markAsRead'])->name('mark-read');
        Route::post('/mark-all-read', [ContactMessageController::class, 'markAllAsRead'])->name('mark-all-read');
        Route::delete('/{contact_message}', [ContactMessageController::class, 'destroy'])->name('destroy');
    });

    // Infrastructure Management
    Route::prefix('infrastructure')->name('infrastructure.')->group(function () {
        Route::get('/', [InfrastructureController::class, 'index'])->name('index')->middleware('admin.permission:view_logs');
        Route::get('/monitoring', [InfrastructureController::class, 'monitoring'])->name('monitoring')->middleware('admin.permission:view_logs');
        Route::get('/maintenance', [InfrastructureController::class, 'maintenance'])->name('maintenance')->middleware('admin.permission:manage_settings');
        Route::post('/maintenance/toggle', [InfrastructureController::class, 'toggleMaintenance'])->name('toggle-maintenance')->middleware('admin.permission:manage_settings');
        Route::get('/backup', [InfrastructureController::class, 'backup'])->name('backup')->middleware('admin.permission:manage_settings');
        Route::post('/backup/create', [InfrastructureController::class, 'createBackup'])->name('create-backup')->middleware('admin.permission:manage_settings');
        Route::post('/cache/clear', [InfrastructureController::class, 'clearCache'])->name('clear-cache')->middleware('admin.permission:manage_settings');
    });

    // Logs Management
    Route::prefix('logs')->name('logs.')->group(function () {
        Route::get('/', [LogController::class, 'index'])->name('index')->middleware('admin.permission:view_logs');
        Route::get('/admin-actions', [LogController::class, 'adminActions'])->name('admin-actions')->middleware('admin.permission:view_logs');
        Route::get('/user-actions', [LogController::class, 'userActions'])->name('user-actions')->middleware('admin.permission:view_logs');
        Route::get('/billing', [LogController::class, 'billingLogs'])->name('billing')->middleware('admin.permission:view_logs');
        Route::get('/security', [LogController::class, 'securityLogs'])->name('security')->middleware('admin.permission:view_logs');
        Route::get('/export', [LogController::class, 'export'])->name('export')->middleware('admin.permission:view_logs');
        Route::get('/{log}', [LogController::class, 'show'])->name('show')->middleware('admin.permission:view_logs');
    });

    // CMS Pages
    Route::prefix('cms')->name('cms.')->group(function () {
        Route::resource('pages', CmsPageController::class)->names([
            'index' => 'pages.index',
            'create' => 'pages.create',
            'store' => 'pages.store',
            'edit' => 'pages.edit',
            'update' => 'pages.update',
            'destroy' => 'pages.destroy',
        ])->middleware('admin.permission:manage_cms');
    });

    // Subscribers
    Route::resource('subscribers', SubscriberController::class)->names([
        'index' => 'subscribers.index',
        'show' => 'subscribers.show',
        'destroy' => 'subscribers.destroy',
    ])->only(['index', 'show', 'destroy']);
    Route::get('subscribers/export', [SubscriberController::class, 'export'])->name('subscribers.export');
    Route::post('subscribers/{subscriber}/verify', [SubscriberController::class, 'verify'])->name('subscribers.verify');
    Route::post('subscribers/{subscriber}/unsubscribe', [SubscriberController::class, 'unsubscribe'])->name('subscribers.unsubscribe');
});
