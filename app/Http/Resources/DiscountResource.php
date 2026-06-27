<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DiscountResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'product_id' => $this->product_id,
            'type' => $this->type,
            'value' => (float) $this->value,
            'starts_at' => $this->starts_at?->toDateString(),
            'ends_at' => $this->ends_at?->toDateString(),
            'is_active' => (bool) $this->is_active,
            // currently_active = is_active && tanggal sekarang dalam rentang (dihitung server).
            'currently_active' => $this->isCurrentlyActive(),
        ];
    }
}
