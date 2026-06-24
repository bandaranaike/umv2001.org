<?php

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;

uses(RefreshDatabase::class);

test('public pages load', function (string $routeName) {
    $this->get(route($routeName))->assertOk();
})->with([
    'home',
    'about',
    'events.index',
    'contact',
    'legal.terms',
    'legal.privacy',
    'legal.cookies',
]);

test('public events show only published events', function () {
    $admin = User::factory()->admin()->create();
    $published = Event::factory()->published()->create(['created_by' => $admin->id, 'title' => 'Published Event']);
    $draft = Event::factory()->create(['created_by' => $admin->id, 'title' => 'Draft Event']);

    $this->get(route('events.index'))
        ->assertOk()
        ->assertInertia(fn (Assert $page) => $page
            ->component('Events/Index')
            ->where('events.data.0.title', 'Published Event'));

    $this->get(route('events.show', $published->slug))->assertOk();
    $this->get(route('events.show', $draft->slug))->assertNotFound();
});
