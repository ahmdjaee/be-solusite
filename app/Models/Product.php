<?php

namespace App\Models;

use App\Models\Concerns\HasSortOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory, HasSortOrder;

    public const CMS_SLUG = 'cms';

    protected $fillable = [
        'category_id',
        'name',
        'short',
        'description',
        'price',
        'static_price',
        'dynamic_price',
        'label',
        'status',
        'type',
        'availability',
        'tags',
        'thumbnail',
        'demo_url',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'static_price' => 'integer',
            'dynamic_price' => 'integer',
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
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

    public function categorySlug(): ?string
    {
        return $this->category?->slug;
    }

    public function isCms(): bool
    {
        return $this->categorySlug() === self::CMS_SLUG;
    }

    /**
     * Harga jual final ("mulai dari"). Diskon TIDAK mengurangi harga ini —
     * untuk produk CMS harganya adalah paket Statis (default Rp500.000),
     * untuk produk lain memakai `price`.
     */
    public function finalPrice(): float
    {
        if ($this->isCms()) {
            return (float) ($this->static_price ?? 500000);
        }

        return (float) $this->price;
    }

    /**
     * Harga coret (marketing) dari harga final berdasarkan diskon aktif.
     * Mengembalikan null bila tidak ada diskon aktif.
     */
    public function originalPrice(): ?float
    {
        return $this->strikethroughFor($this->finalPrice());
    }

    /**
     * Hitung harga coret untuk sebuah harga paket (mis. Statis / Dinamis)
     * memakai diskon aktif produk. Null bila tidak ada diskon aktif.
     */
    public function strikethroughFor(?float $base): ?float
    {
        if ($base === null) {
            return null;
        }

        $discount = $this->relationLoaded('activeDiscount')
            ? $this->activeDiscount
            : $this->activeDiscount()->first();

        return $discount?->strikethrough($base);
    }
}
