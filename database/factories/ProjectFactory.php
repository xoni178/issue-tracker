<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->sentence(2),
            "description" => $this->faker->paragraph(10),
            "start_date" => $this->faker->dateTimeBetween("-1 week", "now"),
            "deadline" => $this->faker->dateTimeBetween("+1 week", "+1 year"),
        ];
    }
}
