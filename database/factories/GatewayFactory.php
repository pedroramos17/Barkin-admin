<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gateway>
 */
class GatewayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'input' => $this->faker->dateTimeThisMonth('-2 days'),
            'output' => $this->faker->dateTime(),
            'permanence' => $this->faker->boolean(),
        ];
    }
}
