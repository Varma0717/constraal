<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CmsPageController;
use App\Http\Controllers\Admin\SubscriberController;

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // CMS Pages Management
    Route::resource('cms/pages', CmsPageController::class)
        ->names('cms.pages')
        ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

    Route::post('cms/pages/{page}/restore', [CmsPageController::class, 'restore'])
        ->name('cms.pages.restore');

    Route::delete('cms/pages/{page}/force-delete', [CmsPageController::class, 'forceDelete'])
        ->name('cms.pages.forceDelete');

    // Subscriber Management
    Route::resource('subscribers', SubscriberController::class)
        ->names('subscribers')
        ->only(['index', 'show', 'destroy']);

    Route::post('subscribers/{subscriber}/verify', [SubscriberController::class, 'verify'])
        ->name('subscribers.verify');

    Route::post('subscribers/{subscriber}/unsubscribe', [SubscriberController::class, 'unsubscribe'])
        ->name('subscribers.unsubscribe');

    Route::post('subscribers/bulk-unsubscribe', [SubscriberController::class, 'bulkUnsubscribe'])
        ->name('subscribers.bulkUnsubscribe');

    Route::get('subscribers/export/csv', [SubscriberController::class, 'export'])
        ->name('subscribers.export');

    Route::get('subscribers/stats', [SubscriberController::class, 'stats'])
        ->name('subscribers.stats');
});
