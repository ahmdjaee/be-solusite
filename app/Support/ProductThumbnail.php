<?php

namespace App\Support;

use App\Http\Requests\Admin\ProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductThumbnail
{
    public static function dataFrom(ProductRequest $request, ?Product $product = null): array
    {
        $data = $request->validated();

        if (! $request->hasFile('thumbnail')) {
            unset($data['thumbnail']);

            return $data;
        }

        if ($product?->thumbnail && ! str_starts_with($product->thumbnail, 'http')) {
            Storage::disk('public')->delete($product->thumbnail);
        }

        $data['thumbnail'] = $request->file('thumbnail')->store('products', 'public');

        return $data;
    }
}
