<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\MemberFamilyMember;
use App\Models\MemberProfile;
use App\Models\MembershipPayment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::factory()->admin()->create([
            'name' => 'UMV Admin',
            'email' => 'admin@umv2001.org',
            'password' => Hash::make('password'),
            'membership_number' => null,
        ]);

        $members = User::factory(5)->create();

        $members->each(function (User $member) use ($admin): void {
            MemberProfile::factory()->create([
                'user_id' => $member->id,
                'full_name' => $member->name,
                'email' => $member->email,
                'phone' => $member->phone,
                'address' => $member->address,
                'membership_number' => $member->membership_number,
            ]);

            MemberFamilyMember::factory(2)->create([
                'user_id' => $member->id,
            ]);

            MembershipPayment::factory(3)->sequence(
                ['month' => 1, 'year' => (int) date('Y')],
                ['month' => 2, 'year' => (int) date('Y')],
                ['month' => 3, 'year' => (int) date('Y')],
            )->create([
                'user_id' => $member->id,
                'recorded_by' => $admin->id,
            ]);
        });

        Event::factory(3)->published()->create([
            'created_by' => $admin->id,
        ]);
    }
}
