<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Choice;
use App\Models\Question;

class ChoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Choice::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'questionId' => Question::inRandomOrder()->first(),
            'img' => asset($this->faker->image()),
            'description' => $this->faker->text(),
            'istrue' => $this->faker->boolean(),
        ];
    }
}
