<?php

use App\Enums\UserRole;
use App\Models\MembershipPayment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;

uses(RefreshDatabase::class);

test('umv tables and user fields exist', function () {
    expect(Schema::hasColumns('users', [
        'role',
        'membership_number',
        'phone',
        'address',
        'is_active',
        'joined_at',
    ]))->toBeTrue();

    expect(Schema::hasTable('member_profiles'))->toBeTrue()
        ->and(Schema::hasTable('member_family_members'))->toBeTrue()
        ->and(Schema::hasTable('membership_payments'))->toBeTrue()
        ->and(Schema::hasTable('events'))->toBeTrue()
        ->and(Schema::hasTable('event_photos'))->toBeTrue()
        ->and(Schema::hasTable('contact_messages'))->toBeTrue();
});

test('admin middleware blocks members', function () {
    $member = User::factory()->create(['role' => UserRole::Member]);

    $this->actingAs($member)
        ->get(route('admin.dashboard'))
        ->assertForbidden();
});

test('inactive users are blocked from protected umv areas', function () {
    $member = User::factory()->inactive()->create();

    $this->actingAs($member)
        ->get(route('member.dashboard'))
        ->assertForbidden();
});

test('duplicate monthly payment is prevented', function () {
    $admin = User::factory()->admin()->create();
    $member = User::factory()->create();

    MembershipPayment::factory()->create([
        'user_id' => $member->id,
        'recorded_by' => $admin->id,
        'month' => 6,
        'year' => 2026,
    ]);

    $this->actingAs($admin)
        ->post(route('admin.payments.store'), [
            'user_id' => $member->id,
            'month' => 6,
            'year' => 2026,
            'amount' => 1000,
            'paid_at' => '2026-06-24',
            'payment_method' => 'cash',
        ])
        ->assertSessionHasErrors('user_id_month_year');
});
