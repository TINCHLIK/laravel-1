<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "ism" =>$this->faker->name,
            "fam" =>$this->faker->name,
            "yosh"=>$this->faker->numberBetween($min = 18, $max = 35),
            "jins"=>$this->faker->boolean()
        ];
    }
}
