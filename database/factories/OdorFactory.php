<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Odor>
 */
class OdorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'id_user' => \App\Models\User::factory(),  // Or a random user ID
        'jenis' => $this->faker->randomElement(['rutin', 'insidentil']),
        'stakeholder' => $this->faker->randomElement(['internal', 'BNN','POLRI']),
        'room' => $this->faker->word(),
        'HP' => $this->faker->numberBetween(1, 10),
        'SAJAM' => $this->faker->numberBetween(1, 10),
        'BARANGELEKTRONIK' => $this->faker->numberBetween(1, 10),
        'NARKOBA' => $this->faker->numberBetween(1, 10),
        'BA' => $this->faker->word(),  // Nullable
        'dokumentasi' => $this->faker->paragraph(),

        ];
    }
}
