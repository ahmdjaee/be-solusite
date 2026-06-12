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

    public function test_admin_can_reorder_products_and_api_uses_the_saved_order(): void
    {
        $products = collect([
            ['name' => 'First Product', 'short' => 'First'],
            ['name' => 'Second Product', 'short' => 'Second'],
            ['name' => 'Third Product', 'short' => 'Third'],
        ])->map(fn (array $data) => Product::create($data + [
            'description' => 'Product used for reorder testing.',
            'price' => 100000,
            'status' => 'published',
            'type' => 'app',
            'availability' => 'ready',
            'tags' => [],
        ]));

        $items = [
            $products[2]->id,
            $products[0]->id,
            $products[1]->id,
        ];

        $this->putJson(route('admin.products.reorder'), ['items' => $items])
            ->assertUnauthorized();

        $this->actingAs(User::factory()->create())
            ->putJson(route('admin.products.reorder'), ['items' => $items])
            ->assertOk();

        $this->assertSame($items, Product::ordered()->pluck('id')->all());

        $this->getJson('/api/products')
            ->assertOk()
            ->assertJsonPath('data.0.id', $products[2]->id)
            ->assertJsonPath('data.1.id', $products[0]->id)
            ->assertJsonPath('data.2.id', $products[1]->id);
    }
}
