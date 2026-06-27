<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Support\ProductThumbnail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        // Storefront membutuhkan seluruh katalog (untuk grouping per kategori),
        // jadi tidak dipaginasi. Eager load kategori + diskon aktif untuk harga.
        return ProductResource::collection(
            Product::with(['category', 'activeDiscount'])->ordered()->get()
        );
    }

    public function store(ProductRequest $request): JsonResponse
    {
        $product = Product::create(ProductThumbnail::dataFrom($request));

        return ProductResource::make($product->load(['category', 'activeDiscount']))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Product $product): ProductResource
    {
        return ProductResource::make($product->load(['category', 'activeDiscount']));
    }

    public function update(ProductRequest $request, Product $product): ProductResource
    {
        $product->update(ProductThumbnail::dataFrom($request, $product));

        return ProductResource::make($product->refresh()->load(['category', 'activeDiscount']));
    }

    public function destroy(Product $product): JsonResponse
    {
        $product->delete();

        return response()->json(null, 204);
    }
}
