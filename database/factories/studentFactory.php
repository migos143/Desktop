<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class studentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subject = ['BSIT', 'BSHM', 'BEED'];
        return [
            'name' => $this->faker->name,
            'age' => $this->faker->randomDigit,
            'email' => $this->faker->email,
            'subject' => $this->faker->randomElement($subject),
        ];
    }
}
