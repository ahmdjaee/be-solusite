<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard.index', [
            'title' => 'Dashboard',
            'subtitle' => 'Ringkasan katalog produk digital.',
            'summary' => [
                ['label' => 'Total Categories', 'value' => Category::count(), 'icon' => 'bi-tags', 'tone' => 'success'],
                ['label' => 'Total Products', 'value' => Product::count(), 'icon' => 'bi-box-seam', 'tone' => ''],
                ['label' => 'CMS Products', 'value' => Product::whereHas('category', fn ($q) => $q->where('slug', Product::CMS_SLUG))->count(), 'icon' => 'bi-window', 'tone' => 'warning'],
                ['label' => 'Active Discounts', 'value' => Discount::currentlyActive()->count(), 'icon' => 'bi-percent', 'tone' => 'danger'],
            ],
            'products' => Product::with('category')->latest()->take(5)->get(),
        ]);
    }
}
