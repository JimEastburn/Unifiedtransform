<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

class SectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Section::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'section_name' => $this->faker->randomElement(['Section A', 'Section B', 'Section C']),
            'room_no' => $this->faker->numberBetween(101, 505),
            'class_id' => 1,
            'session_id' => 1,
        ];
    }
}
