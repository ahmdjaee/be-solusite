<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $name = $this->faker->unique()->catchPhrase();

        return [
            'category_id' => Category::factory(),
            'name' => $name,
            'short' => $this->faker->sentence(6),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->numberBetween(500000, 5000000),
            'static_price' => 500000,
            'dynamic_price' => 1989000,
            'label' => $this->faker->randomElement(['Baru', 'Populer', 'Bestseller', null]),
            'status' => 'published',
            'type' => $this->faker->randomElement(['app', 'source-code']),
            'availability' => $this->faker->randomElement(['ready', 'custom']),
            'tags' => $this->faker->randomElements(
                ['Mudah dikelola', 'Responsif', 'SEO', 'Cepat', 'Aman', 'Tanpa coding'],
                3
            ),
            'thumbnail' => null,
            'demo_url' => $this->faker->optional()->url(),
        ];
    }

    public function cms(): static
    {
        return $this->state(fn (): array => [
            'category_id' => Category::factory()->state(['slug' => 'cms', 'name' => 'CMS']),
            'type' => 'app',
            'availability' => 'ready',
            'price' => 1989000,
            'static_price' => 500000,
            'dynamic_price' => 1989000,
        ]);
    }
}
