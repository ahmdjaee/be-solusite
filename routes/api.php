<?php

use App\Http\Controllers\Api\Admin\CategoryController;
use App\Http\Controllers\Api\Admin\DiscountController;
use App\Http\Controllers\Api\Admin\ProductController;
use App\Http\Controllers\Api\Admin\SettingController;
use Illuminate\Support\Facades\Route;

Route::name('api.')->group(function (): void {
    // Storefront katalog produk digital (CMS, dll).
    Route::apiResource('products', ProductController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('discounts', DiscountController::class);

    // Pengaturan situs (logo, kontak CTA, media sosial) untuk storefront.
    Route::get('settings', [SettingController::class, 'index']);
});

// Endpoint lama services/plans/portfolio sudah di-deprecate — storefront baru
// tidak memakainya lagi. Modul admin (web) masih mengelola data tersebut.
