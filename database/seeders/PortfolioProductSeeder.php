<?php

namespace Database\Seeders;

use App\Models\Discount;
use App\Models\Plan;
use App\Models\Portfolio;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Database\Seeder;

class PortfolioProductSeeder extends Seeder
{
    public function run(): void
    {
        $starter = Product::updateOrCreate(
            ['name' => 'Starter SaaS Boilerplate'],
            [
                'short' => 'Laravel SaaS starter kit with billing-ready structure.',
                'description' => 'Boilerplate SaaS untuk mempercepat development dashboard, subscription flow, role sederhana, dan REST API product.',
                'price' => 2500000,
                'label' => 'Bestseller',
                'status' => 'published',
                'type' => 'app',
                'availability' => 'ready',
                'tags' => ['Laravel', 'SaaS', 'API', 'Dashboard'],
                'thumbnail' => null,
            ],
        );

        $ecommerce = Product::updateOrCreate(
            ['name' => 'E-Commerce Source Code'],
            [
                'short' => 'Source code toko online lengkap.',
                'description' => 'Template e-commerce dengan katalog, cart, checkout, order management, dan halaman admin siap dikembangkan.',
                'price' => 1800000,
                'label' => 'Source',
                'status' => 'published',
                'type' => 'source-code',
                'availability' => 'ready',
                'tags' => ['Laravel', 'E-Commerce', 'Checkout'],
                'thumbnail' => null,
            ],
        );

        $booking = Product::updateOrCreate(
            ['name' => 'Booking App for Services'],
            [
                'short' => 'Aplikasi booking jasa dengan kalender.',
                'description' => 'Aplikasi booking untuk salon, klinik, konsultan, dan jasa appointment dengan jadwal, status booking, serta notifikasi dasar.',
                'price' => 3200000,
                'label' => 'Custom-ready',
                'status' => 'published',
                'type' => 'app',
                'availability' => 'custom',
                'tags' => ['Booking', 'Calendar', 'Service App'],
                'thumbnail' => null,
            ],
        );

        Service::updateOrCreate(
            ['name' => 'MVP Product Build'],
            [
                'description' => 'Pembuatan MVP web app dari scope, database, dashboard admin, sampai deployment awal.',
                'level' => 'Advanced',
                'price' => 12000000,
                'availability' => 'custom',
                'features' => ['Discovery', 'UI implementation', 'Backend API', 'Deployment'],
            ],
        );

        Service::updateOrCreate(
            ['name' => 'Source Code Customization'],
            [
                'description' => 'Modifikasi source code produk digital agar sesuai workflow bisnis dan branding.',
                'level' => 'Standard',
                'price' => 3500000,
                'availability' => 'ready',
                'features' => ['Theme adjustment', 'Module changes', 'Bug fixing'],
            ],
        );

        Service::updateOrCreate(
            ['name' => 'API Integration Sprint'],
            [
                'description' => 'Integrasi payment gateway, WhatsApp notification, CRM, atau API internal.',
                'level' => 'Intermediate',
                'price' => 5000000,
                'availability' => 'custom',
                'features' => ['API mapping', 'Webhook handling', 'Testing'],
            ],
        );

        Portfolio::updateOrCreate(
            ['name' => 'Property Listing Platform'],
            [
                'description' => 'Platform listing properti dengan search, lead capture, dan dashboard agent.',
                'stack' => ['Laravel', 'MySQL', 'Bootstrap', 'REST API'],
            ],
        );

        Portfolio::updateOrCreate(
            ['name' => 'Clinic Appointment System'],
            [
                'description' => 'Sistem appointment klinik dengan jadwal dokter, booking pasien, dan reminder.',
                'stack' => ['Laravel', 'Blade', 'Queue', 'WhatsApp API'],
            ],
        );

        Portfolio::updateOrCreate(
            ['name' => 'Digital Course Dashboard'],
            [
                'description' => 'Dashboard kursus digital untuk mengelola materi, pembayaran, dan progress siswa.',
                'stack' => ['Laravel', 'REST API', 'Bootstrap', 'MySQL'],
            ],
        );

        Plan::updateOrCreate(
            ['name' => 'Launch'],
            [
                'description' => 'Paket dasar untuk landing page product dan admin CRUD sederhana.',
                'price' => 4500000,
                'highlight' => false,
                'features' => ['Product setup', 'Basic admin', 'Responsive pages'],
            ],
        );

        Plan::updateOrCreate(
            ['name' => 'Growth'],
            [
                'description' => 'Paket populer untuk product digital dengan API dan dashboard lengkap.',
                'price' => 9500000,
                'highlight' => true,
                'features' => ['Custom modules', 'REST API', 'Auth', 'Deployment support'],
            ],
        );

        Plan::updateOrCreate(
            ['name' => 'Scale'],
            [
                'description' => 'Paket advanced untuk workflow bisnis kompleks dan integrasi pihak ketiga.',
                'price' => 18000000,
                'highlight' => false,
                'features' => ['Advanced workflow', 'Third-party integration', 'Queue jobs', 'Optimization'],
            ],
        );

        Discount::updateOrCreate(
            ['code' => 'SAASLAUNCH20'],
            [
                'product_id' => $starter->id,
                'name' => 'SaaS Launch Promo',
                'type' => 'percentage',
                'value' => 20,
                'starts_at' => now()->subDay(),
                'ends_at' => now()->addMonth(),
                'is_active' => true,
            ],
        );

        Discount::updateOrCreate(
            ['code' => 'SOURCE500K'],
            [
                'product_id' => $ecommerce->id,
                'name' => 'Source Code Discount',
                'type' => 'fixed',
                'value' => 500000,
                'starts_at' => now()->subWeek(),
                'ends_at' => now()->addWeeks(2),
                'is_active' => true,
            ],
        );

        Discount::updateOrCreate(
            ['code' => 'BOOKINGOLD'],
            [
                'product_id' => $booking->id,
                'name' => 'Expired Booking Promo',
                'type' => 'percentage',
                'value' => 10,
                'starts_at' => now()->subMonths(2),
                'ends_at' => now()->subMonth(),
                'is_active' => true,
            ],
        );
    }
}
