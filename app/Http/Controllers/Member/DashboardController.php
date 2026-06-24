<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\MembershipPayment;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function __invoke(Request $request): Response
    {
        $user = $request->user();
        $profile = $user->memberProfile;
        $currentMonthPayment = MembershipPayment::query()
            ->whereBelongsTo($user)
            ->forPeriod((int) now()->month, (int) now()->year)
            ->first();

        return Inertia::render('Member/Dashboard', [
            'summary' => [
                'name' => $user->name,
                'membership_number' => $user->membership_number,
                'profile_completion' => $profile ? 100 : 45,
                'latest_payment_status' => $currentMonthPayment ? 'Paid' : 'Unpaid',
            ],
            'events' => Event::query()
                ->published()
                ->latest('start_date')
                ->limit(3)
                ->get(['title', 'slug', 'location', 'start_date']),
        ]);
    }
}
