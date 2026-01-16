<?php

namespace Database\Factories;

use App\Models\AssignedTeacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssignedTeacherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AssignedTeacher::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'teacher_id' => 1,
            'semester_id' => 1,
            'class_id' => 1,
            'section_id' => 1,
            'course_id' => 1,
            'session_id' => 1,
        ];
    }
}
