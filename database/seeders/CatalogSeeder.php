<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    public function run(): void
    {
        // ----- Kategori (dinamis, bisa ditambah lewat admin) -----
        $cms = Category::updateOrCreate(
            ['slug' => 'cms'],
            [
                'name' => 'CMS',
                'description' => 'Kelola isi website sendiri tanpa coding.',
                'sort_order' => 1,
                'is_active' => true,
            ],
        );

        $others = Category::updateOrCreate(
            ['slug' => 'others'],
            [
                'name' => 'Lainnya',
                'description' => 'Solusi bisnis lain seperti CRM, POS.',
                'sort_order' => 2,
                'is_active' => true,
            ],
        );

        // ----- Produk CMS (paket Statis 500rb & Dinamis 1.989rb) -----
        $cmsProducts = [
            [
                'slug' => 'solusite-cms',
                'name' => 'Solusite CMS',
                'short' => 'CMS modern untuk website company profile.',
                'description' => 'Sistem manajemen konten serbaguna untuk membangun website company profile yang rapi, cepat, dan mudah dikelola tanpa coding.',
                'tags' => ['Mudah dikelola', 'Responsif', 'SEO'],
            ],
            [
                'slug' => 'toko-online-cms',
                'name' => 'Toko Online CMS',
                'short' => 'Bangun toko online sendiri dengan mudah.',
                'description' => 'CMS toko online lengkap dengan katalog produk, keranjang, dan checkout yang bisa Anda kelola sendiri.',
                'tags' => ['Katalog produk', 'Pembayaran', 'Mudah dikelola'],
            ],
            [
                'slug' => 'blog-berita-cms',
                'name' => 'Blog & Berita CMS',
                'short' => 'Publikasikan artikel dan berita tanpa ribet.',
                'description' => 'CMS untuk media, blog, dan portal berita dengan kategori, tag, dan editor yang ramah pemula.',
                'tags' => ['Editor mudah', 'SEO', 'Kategori'],
            ],
            [
                'slug' => 'landing-page-cms',
                'name' => 'Landing Page CMS',
                'short' => 'Landing page promosi yang gampang diubah.',
                'description' => 'Buat dan ubah landing page promosi produk atau jasa Anda kapan saja tanpa bantuan developer.',
                'tags' => ['Cepat', 'Konversi', 'Mudah dikelola'],
            ],
            [
                'slug' => 'sekolah-cms',
                'name' => 'Sekolah CMS',
                'short' => 'Website sekolah dengan info dan pengumuman.',
                'description' => 'CMS untuk profil sekolah, pengumuman, agenda, dan galeri kegiatan yang mudah diperbarui oleh staf.',
                'tags' => ['Pengumuman', 'Galeri', 'Mudah dikelola'],
            ],
            [
                'slug' => 'portal-desa-cms',
                'name' => 'Portal Desa CMS',
                'short' => 'Portal informasi desa untuk warga.',
                'description' => 'CMS portal desa untuk berbagi informasi layanan, berita, dan potensi desa kepada masyarakat.',
                'tags' => ['Informasi publik', 'Berita', 'Mudah dikelola'],
            ],
        ];

        $cmsModels = [];
        foreach ($cmsProducts as $data) {
            $cmsModels[$data['slug']] = Product::updateOrCreate(
                ['name' => $data['name']],
                [
                    'category_id' => $cms->id,
                    'short' => $data['short'],
                    'description' => $data['description'],
                    'price' => 1989000,
                    'static_price' => 500000,
                    'dynamic_price' => 1989000,
                    'label' => 'CMS',
                    'status' => 'published',
                    'type' => 'app',
                    'availability' => 'ready',
                    'tags' => $data['tags'],
                    'thumbnail' => null,
                    'demo_url' => 'https://demo.solusite.studio/'.$data['slug'],
                ],
            );
        }

        // ----- Produk Lainnya (pakai price masing-masing) -----
        $otherProducts = [
            [
                'name' => 'POS Kasir',
                'short' => 'Aplikasi kasir untuk toko dan UMKM.',
                'description' => 'Aplikasi point of sale untuk mencatat penjualan, stok, dan laporan harian toko Anda.',
                'price' => 2500000,
                'type' => 'app',
                'availability' => 'ready',
                'tags' => ['Kasir', 'Laporan', 'Stok'],
            ],
            [
                'name' => 'CRM Pelanggan',
                'short' => 'Kelola data dan hubungan pelanggan.',
                'description' => 'Sistem CRM untuk mengelola kontak, prospek, dan riwayat interaksi pelanggan agar penjualan lebih tertata.',
                'price' => 3500000,
                'type' => 'app',
                'availability' => 'custom',
                'tags' => ['Pelanggan', 'Prospek', 'Penjualan'],
            ],
            [
                'name' => 'Inventory Management',
                'short' => 'Pantau stok barang secara real-time.',
                'description' => 'Aplikasi manajemen inventory untuk memantau stok masuk, keluar, dan ketersediaan barang di gudang.',
                'price' => 3000000,
                'type' => 'app',
                'availability' => 'custom',
                'tags' => ['Stok', 'Gudang', 'Laporan'],
            ],
            [
                'name' => 'Booking Online',
                'short' => 'Sistem reservasi dan janji temu online.',
                'description' => 'Aplikasi booking online untuk jasa, klinik, atau tempat usaha dengan jadwal dan konfirmasi otomatis.',
                'price' => 2800000,
                'type' => 'app',
                'availability' => 'custom',
                'tags' => ['Reservasi', 'Jadwal', 'Otomatis'],
            ],
        ];

        $otherModels = [];
        foreach ($otherProducts as $data) {
            $otherModels[$data['name']] = Product::updateOrCreate(
                ['name' => $data['name']],
                [
                    'category_id' => $others->id,
                    'short' => $data['short'],
                    'description' => $data['description'],
                    'price' => $data['price'],
                    'static_price' => null,
                    'dynamic_price' => null,
                    'label' => null,
                    'status' => 'published',
                    'type' => $data['type'],
                    'availability' => $data['availability'],
                    'tags' => $data['tags'],
                    'thumbnail' => null,
                    'demo_url' => null,
                ],
            );
        }

        // ----- Diskon marketing aktif (hanya untuk harga coret) -----
        $discounts = [
            ['code' => 'LAUNCH20', 'name' => 'Promo Peluncuran', 'product' => $cmsModels['solusite-cms'], 'type' => 'percentage', 'value' => 20],
            ['code' => 'TOKO15', 'name' => 'Promo Toko Online', 'product' => $cmsModels['toko-online-cms'], 'type' => 'percentage', 'value' => 15],
            ['code' => 'LANDING200', 'name' => 'Potongan Landing Page', 'product' => $cmsModels['landing-page-cms'], 'type' => 'fixed', 'value' => 200000],
            ['code' => 'SEKOLAH25', 'name' => 'Promo Sekolah', 'product' => $cmsModels['sekolah-cms'], 'type' => 'percentage', 'value' => 25],
            ['code' => 'POS15', 'name' => 'Promo POS Kasir', 'product' => $otherModels['POS Kasir'], 'type' => 'percentage', 'value' => 15],
            ['code' => 'CRM20', 'name' => 'Promo CRM', 'product' => $otherModels['CRM Pelanggan'], 'type' => 'percentage', 'value' => 20],
        ];

        foreach ($discounts as $data) {
            Discount::updateOrCreate(
                ['code' => $data['code']],
                [
                    'product_id' => $data['product']->id,
                    'name' => $data['name'],
                    'type' => $data['type'],
                    'value' => $data['value'],
                    'starts_at' => now()->subWeek(),
                    'ends_at' => now()->addMonths(6),
                    'is_active' => true,
                ],
            );
        }
    }
}
