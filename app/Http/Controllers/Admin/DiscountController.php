<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DiscountRequest;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DiscountController extends Controller
{
    public function index(): View
    {
        return view('admin.discounts.index', [
            'title' => 'Discounts',
            'discounts' => Discount::with('product')->latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.discounts.create', [
            'title' => 'Create Discount',
            'discount' => new Discount(['type' => 'percentage', 'is_active' => true]),
            'products' => Product::orderBy('name')->get(),
        ]);
    }

    public function store(DiscountRequest $request): RedirectResponse
    {
        Discount::create($request->validated());

        return redirect()->route('admin.discounts.index')->with('success', 'Discount berhasil dibuat.');
    }

    public function edit(Discount $discount): View
    {
        return view('admin.discounts.edit', [
            'title' => 'Edit Discount',
            'discount' => $discount,
            'products' => Product::orderBy('name')->get(),
        ]);
    }

    public function update(DiscountRequest $request, Discount $discount): RedirectResponse
    {
        $discount->update($request->validated());

        return redirect()->route('admin.discounts.index')->with('success', 'Discount berhasil diperbarui.');
    }

    public function destroy(Discount $discount): RedirectResponse
    {
        $discount->delete();

        return redirect()->route('admin.discounts.index')->with('success', 'Discount berhasil dihapus.');
    }
}
