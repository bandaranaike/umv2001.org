<?php

use App\Models\ContactMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('contact message can be submitted with email', function () {
    $this->post(route('contact.store'), [
        'name' => 'Community Member',
        'email' => 'visitor@example.com',
        'message' => 'Please contact me.',
    ])->assertRedirect(route('contact'));

    $this->assertDatabaseHas(ContactMessage::class, [
        'name' => 'Community Member',
        'email' => 'visitor@example.com',
        'is_read' => false,
    ]);
});

test('contact message requires email or phone', function () {
    $this->post(route('contact.store'), [
        'name' => 'Community Member',
        'message' => 'Please contact me.',
    ])->assertSessionHasErrors(['email', 'phone']);
});
