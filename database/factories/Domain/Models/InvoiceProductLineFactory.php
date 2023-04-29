<?php

namespace Database\Factories\Domain\Models;

use App\Domain\Enums\StatusEnum;
use App\Domain\Models\Company;
use App\Domain\Models\Invoice;
use App\Domain\Models\InvoiceProductLine;
use App\Domain\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Model>
 */
class InvoiceProductLineFactory extends Factory
{
    protected $model = InvoiceProductLine::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => fake()->uuid(),
            'invoice_id' => Invoice::factory(),
            'product_id' => Product::factory(),
            'quantity' => fake()->numberBetween(0,100),
            'created_at' => fake()->dateTime(),
            'updated_at' => fake()->dateTime()
        ];
    }
}
