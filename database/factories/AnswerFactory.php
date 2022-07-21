<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'ans_body' => $this->faker->paragraphs(rand(3,7),true),
            'votes_count'=> rand(-3,10),
            'question_id'=>rand(1,10)
        ];
    }
}
