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
            'discount_amount' => $this->discountAmount(),
            'final_price' => $this->finalPrice(),
            'created_at' => $this->created_at?->toISOString(),
            'updated_at' => $this->updated_at?->toISOString(),
        ];
    }
}
