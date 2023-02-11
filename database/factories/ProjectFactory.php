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
            'title' => $this->faker->sentence,
            'description' => $this->faker->sentence
        ];
    }

    /**
     * @return Factory
     */
    public function nullTitle(): Factory
    {
        return $this->state(function() {
            return [
                'title' => null
            ];
        });
    }

    /**
     * @return Factory
     */
    public function nullDescription(): Factory
    {
        return $this->state(function() {
            return [
                'description' => null
            ];
        });
    }
}
