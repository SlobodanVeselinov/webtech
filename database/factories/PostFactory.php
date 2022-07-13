<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1,4),
            'category_id' => $this->faker->numberBetween(1,6),
            'title' => $this->faker->sentence(),
            'body' => $this->faker->text(200),
            'is_approved' => '1'
        ];
    }
}
