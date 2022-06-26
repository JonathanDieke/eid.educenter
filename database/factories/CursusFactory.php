<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cursus>
 */
class CursusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'is_living_in_russian' => $this->faker->boolean(30) ,
            'legal_status' => Arr::random(["foreign", "local", "permanent_resident"]) ,
            'primary_studies_language' => Arr::random(["french", "english", "spanish", "russian"]) ,
            'secondary_studies_language' => Arr::random(["french", "english", "spanish", "russian"]) ,
            'is_has_russian_college_diploma' => $this->faker->boolean(30) ,
            'is_has_russian_high_school_diploma' => $this->faker->boolean(30) ,
            'is_study_in_russian_university' => $this->faker->boolean(30) ,
            'is_study_in_university' => $this->faker->boolean() ,
            'user_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
