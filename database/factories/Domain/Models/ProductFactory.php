<?php

namespace Database\Factories\Domain\Models;

use App\Domain\Enums\StatusEnum;
use App\Domain\Models\Company;
use App\Domain\Models\Invoice;
use App\Domain\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Model>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => fake()->uuid(),
            'name' => fake()->name(),
            'price' => fake()->numberBetween(0,10000),
            'currency' => 'USD',
            'created_at' => fake()->dateTime(),
            'updated_at' => fake()->dateTime()
        ];
    }
}
