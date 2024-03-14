<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Score;
use App\Models\Type;
use App\Models\User;

class ScoreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Score::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'typeId' => Type::first(),
            'userId' => User::factory(),
            'iq' => $this->faker->numberBetween(10, 95),
            'name' => $this->faker->name(),
        ];
    }
}
