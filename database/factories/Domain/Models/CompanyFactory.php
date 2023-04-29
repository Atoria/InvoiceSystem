<?php

namespace Database\Factories\Domain\Models;

use App\Domain\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Model>
 */
class CompanyFactory extends Factory
{

    protected $model = Company::class;

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
            'street' => fake()->streetName(),
            'city' =>fake()->name(),
            'zip' => fake()->postcode(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'created_at' => fake()->dateTime(),
            'updated_at' => fake()->dateTime()
        ];
    }



}
