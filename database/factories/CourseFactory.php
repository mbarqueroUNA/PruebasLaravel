<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        return [
            'code'     => $this->faker->bothify('INF-###'),
            'name'     => $this->faker->sentence(3),
            'capacity' => 30,
            'teacher_id' => null,
        ];
    }
}