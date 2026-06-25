<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEventRequest;
use App\Http\Requests\Admin\UpdateEventRequest;
use App\Models\Event;
use App\Models\EventPhoto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;

class EventController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Admin/Events/Index', [
            'events' => Event::query()
                ->latest('start_date')
                ->paginate(15)
                ->through(fn (Event $event): array => $this->eventData($event)),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Events/Create');
    }

    public function store(StoreEventRequest $request): RedirectResponse
    {
        $eventData = $request->safe()->except('photos');
        $eventData['slug'] = $this->uniqueSlug(
            $request->string('slug')->toString() ?: $request->string('title')->toString(),
        );

        $event = Event::query()->create([
            ...$eventData,
            'is_published' => $request->boolean('is_published'),
            'published_at' => $request->boolean('is_published') ? now() : null,
            'created_by' => $request->user()->id,
        ]);

        $this->storePhotos($request, $event);

        return to_route('admin.events.edit', $event)
            ->with('toast', ['type' => 'success', 'message' => 'Event created.']);
    }

    public function edit(Event $event): Response
    {
        $event->load('photos');

        return Inertia::render('Admin/Events/Edit', [
            'event' => [
                ...$this->eventData($event),
                'description' => $event->description,
                'end_date' => $event->end_date?->toDateString(),
                'start_time' => $event->start_time?->format('H:i'),
                'end_time' => $event->end_time?->format('H:i'),
                'photos' => $event->photos->map(fn (EventPhoto $photo): array => [
                    'id' => $photo->id,
                    'url' => Storage::url($photo->image_path),
                    'caption' => $photo->caption,
                    'sort_order' => $photo->sort_order,
                ]),
            ],
        ]);
    }

    public function update(UpdateEventRequest $request, Event $event): RedirectResponse
    {
        $event->update([
            ...$request->safe()->except('photos'),
            'is_published' => $request->boolean('is_published'),
            'published_at' => $request->boolean('is_published') ? ($event->published_at ?? now()) : null,
        ]);

        $this->storePhotos($request, $event);

        return to_route('admin.events.edit', $event)
            ->with('toast', ['type' => 'success', 'message' => 'Event updated.']);
    }

    public function destroyPhoto(Event $event, EventPhoto $photo): RedirectResponse
    {
        abort_unless($photo->event_id === $event->id, 404);

        Storage::disk('public')->delete($photo->image_path);
        $photo->delete();

        return back()->with('toast', ['type' => 'success', 'message' => 'Photo deleted.']);
    }

    public function sortPhotos(Request $request, Event $event): RedirectResponse
    {
        $validated = $request->validate([
            'photos' => ['required', 'array'],
            'photos.*.id' => ['required', 'integer', 'exists:event_photos,id'],
            'photos.*.sort_order' => ['required', 'integer', 'min:0'],
        ]);

        collect($validated['photos'])->each(function (array $photo): void {
            EventPhoto::query()
                ->whereKey($photo['id'])
                ->update(['sort_order' => $photo['sort_order']]);
        });

        return back()->with('toast', ['type' => 'success', 'message' => 'Photos sorted.']);
    }

    private function storePhotos(Request $request, Event $event): void
    {
        foreach ($request->file('photos', []) as $photo) {
            $path = $photo->store('event-photos', 'public');

            $event->photos()->create([
                'image_path' => $path,
                'sort_order' => $event->photos()->max('sort_order') + 1,
            ]);
        }
    }

    private function uniqueSlug(string $value): string
    {
        $baseSlug = Str::slug($value) ?: 'event';
        $slug = $baseSlug;
        $suffix = 2;

        while (Event::query()->where('slug', $slug)->exists()) {
            $slug = "{$baseSlug}-{$suffix}";
            $suffix++;
        }

        return $slug;
    }

    /**
     * @return array<string, mixed>
     */
    private function eventData(Event $event): array
    {
        return [
            'id' => $event->id,
            'title' => $event->title,
            'slug' => $event->slug,
            'short_description' => $event->short_description,
            'location' => $event->location,
            'start_date' => $event->start_date->toDateString(),
            'is_published' => $event->is_published,
            'published_at' => $event->published_at?->toDateTimeString(),
        ];
    }
}
