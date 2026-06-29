<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    private const CACHE_KEY = 'settings.map';

    /** Field teks yang dikelola (file/gambar ditangani terpisah, lihat IMAGE_KEYS). */
    public const TEXT_KEYS = [
        // Branding
        'site_name',
        'tagline',
        // Kontak & CTA
        'whatsapp_number',
        'whatsapp_message',
        'email',
        'phone',
        'address',
        // Media sosial
        'instagram_url',
        'facebook_url',
        'tiktok_url',
        'youtube_url',
        // SEO
        'meta_title',
        'meta_description',
        'meta_keywords',
        'google_analytics_id',
        'google_site_verification',
    ];

    /** Field gambar (disimpan sebagai path, diekspos sebagai `<key>_url`). */
    public const IMAGE_KEYS = [
        'logo',
        'og_image',
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
            // SEO
            'meta_title' => 'Solusite Studio — Website & Aplikasi Siap Pakai',
            'meta_description' => 'Solusite Studio menyediakan CMS dan aplikasi bisnis siap pakai yang mudah dikelola tanpa coding.',
            'meta_keywords' => 'cms, website, aplikasi bisnis, toko online, landing page, solusite',
            'google_analytics_id' => '',
            'google_site_verification' => '',
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

    public static function imageUrl(string $key): ?string
    {
        $path = static::get($key);

        if (! $path) {
            return null;
        }

        return str_starts_with($path, 'http') ? $path : Storage::disk('public')->url($path);
    }

    /** Nilai siap-pakai (default + override DB), termasuk URL gambar. */
    public static function publicValues(): array
    {
        $defaults = static::defaults();
        $values = [];

        foreach (self::TEXT_KEYS as $key) {
            $values[$key] = static::get($key, $defaults[$key] ?? null);
        }

        foreach (self::IMAGE_KEYS as $key) {
            $values[$key.'_url'] = static::imageUrl($key);
        }

        return $values;
    }
}
