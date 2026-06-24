<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class EventController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Events/Index', [
            'events' => Event::query()
                ->published()
                ->with(['photos' => fn ($query) => $query->limit(1)])
                ->latest('start_date')
                ->paginate(9)
                ->through(fn (Event $event): array => $this->eventSummary($event)),
        ]);
    }

    public function show(string $slug): Response
    {
        $event = Event::query()
            ->published()
            ->with('photos')
            ->where('slug', $slug)
            ->firstOrFail();

        return Inertia::render('Events/Show', [
            'event' => [
                ...$this->eventSummary($event),
                'description' => $event->description,
                'end_date' => $event->end_date?->toDateString(),
                'start_time' => $event->start_time?->format('H:i'),
                'end_time' => $event->end_time?->format('H:i'),
                'photos' => $event->photos->map(fn ($photo): array => [
                    'id' => $photo->id,
                    'url' => Storage::url($photo->image_path),
                    'caption' => $photo->caption,
                ]),
            ],
        ]);
    }

    /**
     * @return array<string, mixed>
     */
    private function eventSummary(Event $event): array
    {
        $cover = $event->photos->first();

        return [
            'id' => $event->id,
            'title' => $event->title,
            'slug' => $event->slug,
            'short_description' => $event->short_description,
            'location' => $event->location,
            'start_date' => $event->start_date->toDateString(),
            'cover_url' => $cover ? Storage::url($cover->image_path) : null,
        ];
    }
}
