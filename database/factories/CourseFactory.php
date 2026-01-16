<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_name' => $this->faker->randomElement(['Mathematics', 'English', 'Science', 'History', 'Physics', 'Chemistry', 'Biology']),
            'course_type' => $this->faker->randomElement(['theory', 'practical']),
            'class_id' => 1,
            'semester_id' => 1,
            'session_id' => 1,
        ];
    }
}
