<?php

namespace App\Models;

use App\Models\Concerns\HasSortOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory, HasSortOrder;

    protected $fillable = [
        'name',
        'short',
        'description',
        'price',
        'label',
        'status',
        'type',
        'availability',
        'tags',
        'thumbnail',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'tags' => 'array',
        ];
    }

    protected static function booted(): void
    {
        static::deleting(function (Product $product): void {
            if ($product->thumbnail && ! str_starts_with($product->thumbnail, 'http')) {
                Storage::disk('public')->delete($product->thumbnail);
            }
        });
    }

    public function getThumbnailUrlAttribute(): ?string
    {
        if (! $this->thumbnail) {
            return null;
        }

        if (str_starts_with($this->thumbnail, 'http')) {
            return $this->thumbnail;
        }

        return Storage::disk('public')->url($this->thumbnail);
    }

    public function discounts(): HasMany
    {
        return $this->hasMany(Discount::class);
    }

    public function activeDiscount(): HasOne
    {
        return $this->hasOne(Discount::class)
            ->where('is_active', true)
            ->where(function ($query): void {
                $query->whereNull('starts_at')->orWhere('starts_at', '<=', now());
            })
            ->where(function ($query): void {
                $query->whereNull('ends_at')->orWhere('ends_at', '>=', now());
            })
            ->latestOfMany();
    }

    public function discountAmount(): float
    {
        $discount = $this->activeDiscount()->first();

        if (! $discount) {
            return 0.0;
        }

        $price = (float) $this->price;
        $amount = $discount->type === 'percentage'
            ? $price * ((float) $discount->value / 100)
            : (float) $discount->value;

        return round(min($amount, $price), 2);
    }

    public function finalPrice(): float
    {
        return round(max((float) $this->price - $this->discountAmount(), 0), 2);
    }
}
