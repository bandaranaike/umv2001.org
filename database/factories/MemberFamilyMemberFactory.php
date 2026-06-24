<?php

namespace Database\Factories;

use App\Models\MemberFamilyMember;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<MemberFamilyMember>
 */
class MemberFamilyMemberFactory extends Factory
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
            'relationship' => fake()->randomElement(['mother', 'father', 'spouse', 'child', 'other']),
            'name' => fake()->name(),
            'phone' => fake()->optional()->phoneNumber(),
            'date_of_birth' => fake()->optional()->date(),
            'notes' => fake()->optional()->sentence(),
        ];
    }
}
