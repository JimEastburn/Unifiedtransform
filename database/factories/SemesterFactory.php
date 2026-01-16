<?php

namespace Database\Factories;

use App\Models\Semester;
use Illuminate\Database\Eloquent\Factories\Factory;

class SemesterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Semester::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'semester_name' => $this->faker->randomElement(['First Semester', 'Second Semester', 'Summer Semester']),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'session_id' => 1,
        ];
    }
}
