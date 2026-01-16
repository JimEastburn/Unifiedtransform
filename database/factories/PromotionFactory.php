<?php

namespace Database\Factories;

use App\Models\Promotion;
use Illuminate\Database\Eloquent\Factories\Factory;

class PromotionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Promotion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_id' => 1,
            'class_id' => 1,
            'section_id' => 1,
            'session_id' => 1,
            'id_card_number' => $this->faker->unique()->numerify('ID-####-####'),
        ];
    }
}
