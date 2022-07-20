<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class QuestionFactory extends Factory
{
    protected $model = Question::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        return [
            'title' => rtrim($this->faker->sentence(rand(5,10)),"."),
            'ques_body' => $this->faker->paragraphs(rand(3,7),true),
             'views_count'=> rand(0,10),
             'answers_count'=> rand(0,10),
             'votes_count'=> rand(-3,10),
            'user_id'=>rand(2,4)
        ];
    }
}
