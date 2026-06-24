<?php

namespace Database\Factories;

use App\Models\MemberProfile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<MemberProfile>
 */
class MemberProfileFactory extends Factory
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
            'full_name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'membership_number' => 'UMV'.fake()->unique()->numberBetween(1000, 9999),
            'nic' => fake()->optional()->numerify('#########V'),
            'date_of_birth' => fake()->optional()->date(),
            'occupation' => fake()->optional()->jobTitle(),
            'account_name' => fake()->optional()->name(),
            'bank_name' => fake()->optional()->company(),
            'branch' => fake()->optional()->city(),
            'account_number' => fake()->optional()->bankAccountNumber(),
        ];
    }
}
