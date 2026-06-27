<?php

namespace Database\Factories;

use App\Models\Discount;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discount>
 */
class DiscountFactory extends Factory
{
    protected $model = Discount::class;

    public function definition(): array
    {
        $type = $this->faker->randomElement(['percentage', 'fixed']);

        return [
            'product_id' => Product::factory(),
            'type' => $type,
            'value' => $type === 'percentage'
                ? $this->faker->numberBetween(5, 50)
                : $this->faker->numberBetween(50000, 500000),
            'starts_at' => now()->subWeek(),
            'ends_at' => now()->addMonth(),
            'is_active' => true,
        ];
    }

    public function expired(): static
    {
        return $this->state(fn (): array => [
            'starts_at' => now()->subMonths(2),
            'ends_at' => now()->subMonth(),
        ]);
    }
}
