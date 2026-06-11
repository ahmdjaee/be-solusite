<?php

use App\Http\Controllers\Api\Admin\DiscountController;
use App\Http\Controllers\Api\Admin\PlanController;
use App\Http\Controllers\Api\Admin\PortfolioController;
use App\Http\Controllers\Api\Admin\ProductController;
use App\Http\Controllers\Api\Admin\ServiceController;
use Illuminate\Support\Facades\Route;

Route::name('api.')->group(function (): void {
    Route::apiResource('products', ProductController::class);
    Route::apiResource('services', ServiceController::class);
    Route::apiResource('portfolio', PortfolioController::class)->parameters(['portfolio' => 'portfolio']);
    Route::apiResource('plans', PlanController::class);
    Route::apiResource('discounts', DiscountController::class);
});
