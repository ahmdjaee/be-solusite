<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DiscountController as AdminDiscountController;
use App\Http\Controllers\Admin\PlanController as AdminPlanController;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/admin');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest')->name('login.store');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function (): void {
    Route::get('/', fn () => redirect()->route('admin.dashboard'))->name('home');
    Route::get('/dashboard', AdminDashboardController::class)->name('dashboard');
    Route::put('/products/reorder', [AdminProductController::class, 'reorder'])->name('products.reorder');
    Route::put('/services/reorder', [AdminServiceController::class, 'reorder'])->name('services.reorder');
    Route::put('/portfolio/reorder', [AdminPortfolioController::class, 'reorder'])->name('portfolio.reorder');
    Route::put('/plans/reorder', [AdminPlanController::class, 'reorder'])->name('plans.reorder');
    Route::resource('products', AdminProductController::class)->except(['show']);
    Route::resource('services', AdminServiceController::class)->except(['show']);
    Route::resource('portfolio', AdminPortfolioController::class)->parameters(['portfolio' => 'portfolio'])->except(['show']);
    Route::resource('plans', AdminPlanController::class)->except(['show']);
    Route::resource('discounts', AdminDiscountController::class)->except(['show']);
});
