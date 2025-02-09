<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Flag;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unit>
 */
class UnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'trade_name' => fake()->company(),
            'corporate_name' => fake()->company(),
            'cnpj' => fake()->numerify('##.###.###/####-##'),
            'flag_id' => Flag::factory(),
        ];
    }
}
