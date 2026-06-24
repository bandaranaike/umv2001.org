<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Event;
use App\Models\MembershipPayment;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function __invoke(): Response
    {
        return Inertia::render('Admin/Dashboard', [
            'metrics' => [
                'total_members' => User::query()->where('role', 'member')->count(),
                'active_members' => User::query()->where('role', 'member')->where('is_active', true)->count(),
                'payments_this_month' => MembershipPayment::query()->forPeriod((int) now()->month, (int) now()->year)->sum('amount'),
                'unread_contact_messages' => ContactMessage::query()->where('is_read', false)->count(),
                'published_events' => Event::query()->published()->count(),
            ],
        ]);
    }
}
