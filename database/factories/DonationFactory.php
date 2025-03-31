<?php

namespace Database\Factories;

use App\Models\Compaign;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Donation>
 */
class DonationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'amount' => $this->faker->randomFloat(2, 1, 1000),
            'payment_method' => $this->faker->randomElement(['cash', 'mpesa']),
            'donation_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'compaign_id' => Compaign::all()->random()->id,
        ];
    }
}
