<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Plan;
use App\Models\Portfolio;
use App\Models\Product;
use App\Models\Service;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard.index', [
            'title' => 'Dashboard',
            'subtitle' => 'Ringkasan portfolio product digital.',
            'summary' => [
                ['label' => 'Total Products', 'value' => Product::count(), 'icon' => 'bi-box-seam', 'tone' => ''],
                ['label' => 'Total Services', 'value' => Service::count(), 'icon' => 'bi-tools', 'tone' => 'success'],
                ['label' => 'Total Portfolio', 'value' => Portfolio::count(), 'icon' => 'bi-window-stack', 'tone' => 'warning'],
                ['label' => 'Active Discounts', 'value' => Discount::currentlyActive()->count(), 'icon' => 'bi-percent', 'tone' => 'danger'],
            ],
            'plans' => Plan::latest()->take(3)->get(),
        ]);
    }
}
