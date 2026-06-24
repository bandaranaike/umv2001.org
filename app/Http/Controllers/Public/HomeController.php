<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function __invoke(): Response
    {
        return Inertia::render('Welcome', [
            'latestEvents' => Event::query()
                ->published()
                ->latest('start_date')
                ->limit(3)
                ->get(['title', 'slug', 'short_description', 'location', 'start_date']),
        ]);
    }
}
