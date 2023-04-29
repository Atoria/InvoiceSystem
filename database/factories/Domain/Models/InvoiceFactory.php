<?php

namespace Database\Factories\Domain\Models;

use App\Domain\Enums\StatusEnum;
use App\Domain\Models\Company;
use App\Domain\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Model>
 */
class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => fake()->uuid(),
            'number' => fake()->uuid(),
            'date' => fake()->dateTime(),
            'due_date' => fake()->dateTime(),
            'company_id' =>  Company::factory(),
            'status' => fake()->randomElement(StatusEnum::cases())->value,
            'created_at' => fake()->dateTime(),
            'updated_at' => fake()->dateTime()
        ];
    }
}
