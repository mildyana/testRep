<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $division = fake()->randomElement(['SOCD', 'CRASD', 'ORD']);
        return [
            'name'=> fake()->name(),
            'division' => $division,
            //
        ];
    }
}
