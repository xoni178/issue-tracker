<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Issue>
 */
class IssueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "project_id" => $this->randomProjectId(),
            "title" => $this->faker->sentence(3, true),
            "description" => $this->faker->paragraph(3, true),
            "priority" => $this->faker->randomElement(['low', 'medium', 'high']),
            "due_date" => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
        ];
    }

    private function randomProjectId()
    {
        $projectIds = \App\Models\Project::pluck('id')->toArray();
        return $this->faker->randomElement($projectIds);
    }
}
