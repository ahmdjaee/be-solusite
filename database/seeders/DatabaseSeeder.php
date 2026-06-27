<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'email' => 'admin@solusite.test',
        ], [
            'name' => 'Admin Solusite',
            'password' => 'password',
        ]);

        // Storefront baru: kategori, produk CMS/lainnya, dan diskon marketing.
        $this->call(CatalogSeeder::class);
    }
}
