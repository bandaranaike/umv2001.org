<?php

namespace Database\Factories;

use App\Models\MembershipPayment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<MembershipPayment>
 */
class MembershipPaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'month' => fake()->numberBetween(1, 12),
            'year' => fake()->numberBetween(2024, (int) date('Y')),
            'amount' => fake()->randomFloat(2, 500, 2500),
            'paid_at' => fake()->date(),
            'payment_method' => fake()->randomElement(['cash', 'bank_transfer', 'online']),
            'reference' => fake()->optional()->bothify('PAY-####'),
            'notes' => fake()->optional()->sentence(),
            'recorded_by' => User::factory()->admin(),
        ];
    }
}
