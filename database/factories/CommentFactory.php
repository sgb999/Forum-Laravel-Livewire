<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comment' => $this->faker->text,
            'post_id' => $this->faker->numberBetween(1,500),
            'user_id' => $this->faker->numberBetween(1,500)
        ];
    }
}
