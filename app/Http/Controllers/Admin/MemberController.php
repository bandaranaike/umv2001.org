<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAdminMemberRequest;
use App\Http\Requests\Admin\UpdateAdminMemberRequest;
use App\Models\MemberProfile;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;

class MemberController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Admin/Members/Index', [
            'members' => User::query()
                ->where('role', UserRole::Member)
                ->latest()
                ->paginate(15)
                ->through(fn (User $user): array => $this->memberSummary($user)),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Members/Create');
    }

    public function store(StoreAdminMemberRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $user = User::query()->create([
            ...$validated,
            'role' => UserRole::Member,
            'is_active' => $request->boolean('is_active', true),
        ]);

        MemberProfile::query()->create([
            'user_id' => $user->id,
            'full_name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'address' => $user->address,
            'membership_number' => $user->membership_number,
        ]);

        return to_route('admin.members.show', $user)
            ->with('toast', ['type' => 'success', 'message' => 'Member created.']);
    }

    public function show(User $user): Response
    {
        $this->authorize('view', $user);

        $user->load(['memberProfile', 'familyMembers', 'membershipPayments' => fn ($query) => $query->latest('paid_at')]);

        return Inertia::render('Admin/Members/Show', [
            'member' => [
                ...$this->memberSummary($user),
                'address' => $user->address,
                'joined_at' => $user->joined_at?->toDateString(),
                'profile' => $user->memberProfile,
                'family_members' => $user->familyMembers,
                'payments' => $user->membershipPayments->map(fn ($payment): array => [
                    'id' => $payment->id,
                    'month' => $payment->month,
                    'year' => $payment->year,
                    'amount' => $payment->amount,
                    'paid_at' => $payment->paid_at->toDateString(),
                    'payment_method' => $payment->payment_method,
                    'reference' => $payment->reference,
                ]),
            ],
        ]);
    }

    public function edit(User $user): Response
    {
        $this->authorize('update', $user);

        return Inertia::render('Admin/Members/Edit', [
            'member' => [
                ...$this->memberSummary($user),
                'address' => $user->address,
                'joined_at' => $user->joined_at?->toDateString(),
            ],
        ]);
    }

    public function update(UpdateAdminMemberRequest $request, User $user): RedirectResponse
    {
        $this->authorize('update', $user);

        $user->update([
            ...$request->validated(),
            'is_active' => $request->boolean('is_active'),
        ]);

        $user->memberProfile()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'full_name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'address' => $user->address,
                'membership_number' => $user->membership_number,
            ],
        );

        return to_route('admin.members.show', $user)
            ->with('toast', ['type' => 'success', 'message' => 'Member updated.']);
    }

    public function resetPassword(User $user): RedirectResponse
    {
        $this->authorize('manage', User::class);

        $temporaryPassword = Str::password(12);

        $user->update([
            'password' => Hash::make($temporaryPassword),
        ]);

        return back()->with('toast', [
            'type' => 'success',
            'message' => "Temporary password reset to {$temporaryPassword}",
        ]);
    }

    /**
     * @return array<string, mixed>
     */
    private function memberSummary(User $user): array
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'membership_number' => $user->membership_number,
            'phone' => $user->phone,
            'is_active' => $user->is_active,
        ];
    }
}
