<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Database\Seeder;

/**
 * Data modul admin lama (services, plans, portfolio). Katalog produk + diskon
 * storefront kini ada di {@see CatalogSeeder}. Seeder ini hanya menjaga panel
 * admin tetap terisi; storefront tidak memakai data di sini.
 */
class PortfolioProductSeeder extends Seeder
{
    public function run(): void
    {
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
    }
}
