<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    private const CACHE_KEY = 'settings.map';

    /** Field teks yang dikelola (logo ditangani terpisah sebagai file). */
    public const TEXT_KEYS = [
        'site_name',
        'tagline',
        'whatsapp_number',
        'whatsapp_message',
        'email',
        'phone',
        'address',
        'instagram_url',
        'facebook_url',
        'tiktok_url',
        'youtube_url',
    ];

    protected static function booted(): void
    {
        $forget = fn () => Cache::forget(self::CACHE_KEY);
        static::saved($forget);
        static::deleted($forget);
    }

    /** Nilai default bila belum disetel di DB. */
    public static function defaults(): array
    {
        return [
            'site_name' => 'Solusite Studio',
            'tagline' => 'Website & aplikasi siap pakai untuk bisnis Anda.',
            'whatsapp_number' => '6281234567890',
            'whatsapp_message' => 'Halo Solusite, saya tertarik dengan produk Anda.',
            'email' => 'hello@solusite.studio',
            'phone' => '+62 812-3456-7890',
            'address' => 'Jakarta, Indonesia',
            'instagram_url' => 'https://instagram.com/solusite.studio',
            'facebook_url' => '',
            'tiktok_url' => '',
            'youtube_url' => '',
        ];
    }

    /** Map key => value dari DB (cache selamanya, di-clear saat save/delete). */
    public static function map(): array
    {
        return Cache::rememberForever(self::CACHE_KEY, fn (): array => static::query()->pluck('value', 'key')->all());
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        return static::map()[$key] ?? $default;
    }

    public static function put(string $key, ?string $value): void
    {
        static::updateOrCreate(['key' => $key], ['value' => $value]);
    }

    public static function logoUrl(): ?string
    {
        $logo = static::get('logo');

        if (! $logo) {
            return null;
        }

        return str_starts_with($logo, 'http') ? $logo : Storage::disk('public')->url($logo);
    }

    /** Nilai siap-pakai (default + override DB), termasuk logo_url. */
    public static function publicValues(): array
    {
        $defaults = static::defaults();
        $values = [];

        foreach (self::TEXT_KEYS as $key) {
            $values[$key] = static::get($key, $defaults[$key] ?? null);
        }

        $values['logo_url'] = static::logoUrl();

        return $values;
    }
}
