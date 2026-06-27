<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'category' => $this->categorySlug(),
            'name' => $this->name,
            'short' => $this->short,
            'description' => $this->description,
            'price' => (float) $this->price,
            'label' => $this->label,
            'status' => $this->status,
            'type' => $this->type,
            'availability' => $this->availability,
            'tags' => $this->tags ?? [],
            'thumbnail' => $this->thumbnail,
            'thumbnail_url' => $this->thumbnail_url,
            'demo_url' => $this->demo_url,
            'static_price' => $this->static_price !== null ? (int) $this->static_price : null,
            'dynamic_price' => $this->dynamic_price !== null ? (int) $this->dynamic_price : null,
            // Server-computed convenience (opsional bagi frontend):
            // final_price = harga jual "mulai dari", original_price = harga coret.
            'final_price' => $this->finalPrice(),
            'original_price' => $this->originalPrice(),
            'created_at' => $this->created_at?->toISOString(),
            'updated_at' => $this->updated_at?->toISOString(),
        ];
    }
}
