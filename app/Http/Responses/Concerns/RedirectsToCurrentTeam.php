<?php

namespace App\Http\Responses\Concerns;

use App\Enums\UserRole;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

trait RedirectsToCurrentTeam
{
    protected function redirectPathForCurrentTeam(Request $request, string $redirect): string
    {
        $team = $this->currentTeam($request);

        URL::defaults(['current_team' => $team->slug]);

        return "/{$team->slug}{$redirect}";
    }

    protected function currentTeam(Request $request): Team
    {
        $user = $request->user();

        abort_if(! $user, 403);

        $team = $user->currentTeam ?? $user->personalTeam();

        abort_if(! $team, 403);

        return $team;
    }

    protected function authenticatedDashboardPath(Request $request): string
    {
        $user = $request->user();

        if ($user?->role === UserRole::Admin) {
            return route('admin.dashboard');
        }

        if ($user?->role === UserRole::Member) {
            return route('member.dashboard');
        }

        return route('member.dashboard');
    }
}
