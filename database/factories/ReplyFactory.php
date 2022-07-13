<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comment_id' => $this->faker->numberBetween(1, 300),
            'user_id' => $this->faker->numberBetween(1, 4),
            'body' => $this->faker->sentence()
        ];
    }
}
