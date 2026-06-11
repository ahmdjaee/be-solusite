<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Database\Seeders\PortfolioProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
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

        $this->getJson('/api/admin/products')
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'name', 'price', 'tags', 'discount_amount', 'final_price'],
                ],
                'links',
                'meta',
            ]);
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
