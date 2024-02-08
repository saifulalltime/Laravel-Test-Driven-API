<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->name(),
            'body' => $this->faker->name(),
            // 'title' => 'This is a single article title',
            // 'body' => 'This is a single article body',
            'user_id' => User::factory()->create()->id,
          ];
    }
}
