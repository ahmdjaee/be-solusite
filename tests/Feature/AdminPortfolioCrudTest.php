<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Database\Seeders\PortfolioProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminPortfolioCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_dashboard_requires_authenticated_user_and_renders(): void
    {
        $this->get('/admin/dashboard')->assertRedirect('/login');

        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/admin/dashboard')
            ->assertOk()
            ->assertSee('Total Products');
    }

    public function test_products_api_is_public_and_paginated(): void
    {
        Product::create([
            'name' => 'Starter SaaS Boilerplate',
            'short' => 'Laravel starter kit.',
            'description' => 'Sample product for testing.',
            'price' => 2500000,
            'label' => 'Bestseller',
            'status' => 'published',
            'type' => 'app',
            'availability' => 'ready',
            'tags' => ['Laravel', 'SaaS'],
            'thumbnail' => null,
        ]);

        $this->getJson('/api/products')
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'name', 'price', 'tags', 'thumbnail', 'thumbnail_url', 'discount_amount', 'final_price'],
                ],
                'links',
                'meta',
            ]);
    }

    public function test_product_api_accepts_thumbnail_upload(): void
    {
        Storage::fake('public');

        $response = $this->post('/api/products', [
            'name' => 'Booking App for Services',
            'short' => 'Booking app with calendar.',
            'description' => 'Aplikasi booking jasa dengan kalender dan dashboard.',
            'price' => 3200000,
            'label' => 'Custom-ready',
            'status' => 'published',
            'type' => 'app',
            'availability' => 'custom',
            'tags' => ['Booking', 'Calendar'],
            'thumbnail' => UploadedFile::fake()->image('booking.jpg', 800, 600),
        ]);

        $response
            ->assertCreated()
            ->assertJsonPath('data.name', 'Booking App for Services')
            ->assertJsonPath('data.thumbnail_url', '/storage/'.$response->json('data.thumbnail'));

        Storage::disk('public')->assertExists($response->json('data.thumbnail'));
    }

    public function test_admin_crud_index_pages_render(): void
    {
        $this->seed(PortfolioProductSeeder::class);

        $user = User::factory()->create();

        foreach ([
            '/admin/products',
            '/admin/services',
            '/admin/portfolio',
            '/admin/plans',
            '/admin/discounts',
        ] as $uri) {
            $this->actingAs($user)->get($uri)->assertOk();
        }
    }
}
