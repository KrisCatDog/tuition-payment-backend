<?php

namespace Database\Factories;

use App\Models\Tuition;
use Illuminate\Database\Eloquent\Factories\Factory;

class TuitionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tuition::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tahun' => $this->faker->year,
            'nominal' => $this->faker->randomNumber(),
        ];
    }
}
