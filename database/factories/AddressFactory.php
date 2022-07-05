<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'address1' => explode("\n", $this->faker->address())[0],
            'address2' => explode("\n", $this->faker->address())[0],
            'country' => 1 ,
            'state' => 3902 ,
            'city' => 99 ,
            'postal_code' => $this->faker->postcode(),
            'tel1' => $this->faker->phoneNumber(),
            'tel2' => $this->faker->phoneNumber(),
            'user_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
