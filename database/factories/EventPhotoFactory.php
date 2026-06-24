<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\EventPhoto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<EventPhoto>
 */
class EventPhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_id' => Event::factory(),
            'image_path' => 'event-photos/sample.jpg',
            'caption' => fake()->optional()->sentence(),
            'sort_order' => fake()->numberBetween(0, 20),
        ];
    }
}
