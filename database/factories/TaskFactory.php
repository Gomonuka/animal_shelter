<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Shelter;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        $shelter = Shelter::inRandomOrder()->first();

        return [
            'TaskName' => $this->faker->sentence,
            'Date' => $this->faker->date(),
            'Time' => $this->faker->time(),
            'user_id' => $user->id,
            'shelter_id' => $shelter->id,
        ];
    }
}
