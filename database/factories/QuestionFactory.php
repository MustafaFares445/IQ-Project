<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Question;
use App\Models\Type;

class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'typeId' => Type::first()->id,
            'title' => $this->faker->text(),
            'img' => asset($this->faker->image()),
            'category' => $this->faker->randomElement(['أ' , 'أب' , 'ب']),
        ];
    }
}
