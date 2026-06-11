<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return ProductResource::collection(Product::latest()->paginate(15));
    }

    public function store(ProductRequest $request): JsonResponse
    {
        return ProductResource::make(Product::create($request->validated()))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Product $product): ProductResource
    {
        return ProductResource::make($product);
    }

    public function update(ProductRequest $request, Product $product): ProductResource
    {
        $product->update($request->validated());

        return ProductResource::make($product->refresh());
    }

    public function destroy(Product $product): JsonResponse
    {
        $product->delete();

        return response()->json(null, 204);
    }
}
