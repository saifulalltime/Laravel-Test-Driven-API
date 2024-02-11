<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name(),
            'details' => $this->faker->text(),
            'price' => $this->faker->numberBetween(100, 1000),
            'quantity' => $this->faker->numberBetween(1, 10),
            'user_id' => User::factory()->create()->id,
        ];
    }

    /**
     * Indicate that the article is published.
     */
    public function published(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'published_at' => now(),
            ];
        });
    }
    /**
     * Indicate that the article is unPublished.
     */
    public function unPublished(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'published_at' => NULL,
            ];
        });
    }
}
