<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Http\Requests\Admin\ReorderRequest;
use App\Models\Category;
use App\Models\Product;
use App\Support\ModelOrder;
use App\Support\ProductThumbnail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('admin.products.index', [
            'title' => 'Products',
            'products' => Product::ordered()->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.products.create', [
            'title' => 'Create Product',
            'product' => new Product(['status' => 'published', 'type' => 'app', 'availability' => 'ready']),
            'categories' => Category::active()->ordered()->get(),
        ]);
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        Product::create(ProductThumbnail::dataFrom($request));

        return redirect()->route('admin.products.index')->with('success', 'Product berhasil dibuat.');
    }

    public function edit(Product $product): View
    {
        return view('admin.products.edit', [
            'title' => 'Edit Product',
            'product' => $product,
            'categories' => Category::active()->ordered()->get(),
        ]);
    }

    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $product->update(ProductThumbnail::dataFrom($request, $product));

        return redirect()->route('admin.products.index')->with('success', 'Product berhasil diperbarui.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product berhasil dihapus.');
    }

    public function reorder(ReorderRequest $request): JsonResponse
    {
        ModelOrder::update(Product::class, $request->validated('items'));

        return response()->json(['message' => 'Urutan product berhasil disimpan.']);
    }
}
