<?php

use App\Models\ContactMessage;
use App\Models\Event;
use App\Models\MembershipPayment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('admin can manage members', function () {
    $admin = User::factory()->admin()->create();

    $this->actingAs($admin)
        ->post(route('admin.members.store'), [
            'name' => 'New Member',
            'email' => 'new-member@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'membership_number' => 'UMV-001',
            'is_active' => true,
        ])
        ->assertRedirect();

    $member = User::query()->where('email', 'new-member@example.com')->firstOrFail();

    $this->actingAs($admin)
        ->get(route('admin.members.show', $member))
        ->assertOk();

    $this->assertDatabaseHas(User::class, [
        'email' => 'new-member@example.com',
        'membership_number' => 'UMV-001',
    ]);
});

test('admin can manage payments events and contact messages', function () {
    $admin = User::factory()->admin()->create();
    $member = User::factory()->create();
    $message = ContactMessage::factory()->create();

    $this->actingAs($admin)
        ->post(route('admin.payments.store'), [
            'user_id' => $member->id,
            'month' => 6,
            'year' => 2026,
            'amount' => 1000,
            'paid_at' => '2026-06-24',
            'payment_method' => 'cash',
        ])
        ->assertRedirect(route('admin.payments.index'));

    $this->assertDatabaseHas(MembershipPayment::class, [
        'user_id' => $member->id,
        'month' => 6,
        'year' => 2026,
    ]);

    $this->actingAs($admin)
        ->post(route('admin.events.store'), [
            'title' => 'Awareness Program',
            'slug' => 'awareness-program',
            'short_description' => 'Student awareness program.',
            'description' => 'Program details.',
            'location' => 'Udadumbara',
            'start_date' => '2026-07-01',
            'is_published' => true,
        ])
        ->assertRedirect();

    $this->assertDatabaseHas(Event::class, [
        'slug' => 'awareness-program',
        'is_published' => true,
    ]);

    $this->actingAs($admin)
        ->patch(route('admin.contact-messages.read', $message))
        ->assertRedirect();

    expect($message->refresh()->is_read)->toBeTrue();
});

test('admin can create events without manually entering a slug', function () {
    $admin = User::factory()->admin()->create();

    $this->actingAs($admin)
        ->post(route('admin.events.store'), [
            'title' => 'Annual Welfare Meeting',
            'short_description' => 'Planning member welfare programs.',
            'description' => 'Meeting details.',
            'location' => 'Udadumbara',
            'start_date' => '2026-09-20',
        ])
        ->assertRedirect();

    $this->assertDatabaseHas(Event::class, [
        'title' => 'Annual Welfare Meeting',
        'slug' => 'annual-welfare-meeting',
    ]);

    $this->actingAs($admin)
        ->post(route('admin.events.store'), [
            'title' => 'Annual Welfare Meeting',
            'short_description' => 'Follow-up welfare planning.',
            'description' => 'Follow-up details.',
            'location' => 'Udadumbara',
            'start_date' => '2026-09-21',
        ])
        ->assertRedirect();

    $this->assertDatabaseHas(Event::class, [
        'title' => 'Annual Welfare Meeting',
        'slug' => 'annual-welfare-meeting-2',
    ]);
});
