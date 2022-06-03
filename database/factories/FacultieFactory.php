<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\facultie>
 */
class FacultieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => "Faculty of " . $faker->unique()->city,
            'created_at' => $faker->dateTime($max = 'now'),
            'updated_at' => $faker->dateTime($max = 'now'),
        ];
    }
}
