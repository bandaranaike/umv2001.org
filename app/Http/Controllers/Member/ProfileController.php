<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\Member\UpdateMemberProfileRequest;
use App\Models\MemberProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    public function edit(): Response
    {
        $user = auth()->user()->load(['memberProfile', 'familyMembers']);

        return Inertia::render('Member/Profile/Edit', [
            'profile' => [
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'address' => $user->address,
                'membership_number' => $user->membership_number,
                'nic' => $user->memberProfile?->nic,
                'date_of_birth' => $user->memberProfile?->date_of_birth?->toDateString(),
                'occupation' => $user->memberProfile?->occupation,
                'account_name' => $user->memberProfile?->account_name,
                'bank_name' => $user->memberProfile?->bank_name,
                'branch' => $user->memberProfile?->branch,
                'account_number' => $user->memberProfile?->account_number,
                'family_members' => $user->familyMembers->map(fn ($familyMember): array => [
                    'id' => $familyMember->id,
                    'relationship' => $familyMember->relationship,
                    'name' => $familyMember->name,
                    'phone' => $familyMember->phone,
                    'date_of_birth' => $familyMember->date_of_birth?->toDateString(),
                    'notes' => $familyMember->notes,
                ]),
            ],
        ]);
    }

    public function update(UpdateMemberProfileRequest $request): RedirectResponse
    {
        $user = $request->user();
        $validated = $request->validated();

        DB::transaction(function () use ($user, $validated): void {
            $user->update([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'address' => $validated['address'] ?? null,
            ]);

            MemberProfile::query()->updateOrCreate(
                ['user_id' => $user->id],
                [
                    'full_name' => $validated['name'],
                    'email' => $validated['email'],
                    'phone' => $validated['phone'] ?? null,
                    'address' => $validated['address'] ?? null,
                    'membership_number' => $user->membership_number,
                    'nic' => $validated['nic'] ?? null,
                    'date_of_birth' => $validated['date_of_birth'] ?? null,
                    'occupation' => $validated['occupation'] ?? null,
                    'account_name' => $validated['account_name'] ?? null,
                    'bank_name' => $validated['bank_name'] ?? null,
                    'branch' => $validated['branch'] ?? null,
                    'account_number' => $validated['account_number'] ?? null,
                ],
            );

            $user->familyMembers()->delete();

            collect($validated['family_members'] ?? [])
                ->filter(fn (array $familyMember): bool => filled($familyMember['name'] ?? null))
                ->each(fn (array $familyMember) => $user->familyMembers()->create($familyMember));
        });

        return to_route('member.profile.edit')
            ->with('toast', [
                'type' => 'success',
                'message' => 'Profile updated.',
            ]);
    }
}
