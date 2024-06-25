<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Shelter;
use App\Models\Category;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $shelter = Shelter::inRandomOrder()->first();
        $category = Category::inRandomOrder()->first();

        return [
            'PetName' => $this->faker->name,
            'shelter_id' => $shelter->id,
            'category_id' => $category->id,
            'Age' => $this->faker->numberBetween(1, 20),
            'Description' => $this->faker->paragraph,
            'Breed' => $this->faker->word,
        ];
    }
}
