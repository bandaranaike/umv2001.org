<?php

use App\Models\MemberProfile;
use App\Models\MembershipPayment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('member can view and update own profile', function () {
    $member = User::factory()->create(['email' => 'member@example.com']);
    MemberProfile::factory()->create(['user_id' => $member->id]);

    $this->actingAs($member)
        ->get(route('member.profile.edit'))
        ->assertOk();

    $this->actingAs($member)
        ->patch(route('member.profile.update'), [
            'name' => 'Updated Member',
            'email' => 'updated@example.com',
            'phone' => '0712345678',
            'address' => 'Udadumbara',
            'role' => 'admin',
            'membership_number' => 'HACK',
            'is_active' => false,
        ])
        ->assertRedirect(route('member.profile.edit'));

    $member->refresh();

    expect($member->name)->toBe('Updated Member')
        ->and($member->role->value)->toBe('member')
        ->and($member->membership_number)->not->toBe('HACK')
        ->and($member->is_active)->toBeTrue();
});

test('member sees only own payments', function () {
    $member = User::factory()->create();
    $otherMember = User::factory()->create();
    $admin = User::factory()->admin()->create();

    MembershipPayment::factory()->create(['user_id' => $member->id, 'recorded_by' => $admin->id, 'reference' => 'OWN']);
    MembershipPayment::factory()->create(['user_id' => $otherMember->id, 'recorded_by' => $admin->id, 'reference' => 'OTHER']);

    $this->actingAs($member)
        ->get(route('member.payments.index'))
        ->assertOk()
        ->assertSee('OWN')
        ->assertDontSee('OTHER');
});
