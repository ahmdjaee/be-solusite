<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('admin.products.index', [
            'title' => 'Products',
            'products' => Product::latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.products.create', [
            'title' => 'Create Product',
            'product' => new Product(['status' => 'published', 'type' => 'app', 'availability' => 'ready']),
        ]);
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        Product::create($request->validated());

        return redirect()->route('admin.products.index')->with('success', 'Product berhasil dibuat.');
    }

    public function edit(Product $product): View
    {
        return view('admin.products.edit', [
            'title' => 'Edit Product',
            'product' => $product,
        ]);
    }

    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->validated());

        return redirect()->route('admin.products.index')->with('success', 'Product berhasil diperbarui.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product berhasil dihapus.');
    }
}
