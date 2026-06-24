<?php

namespace App\Policies;

use App\Models\MembershipPayment;
use App\Models\User;

class MembershipPaymentPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->isAdmin();
    }

    public function view(User $user, MembershipPayment $membershipPayment): bool
    {
        return $user->isAdmin() || $membershipPayment->user_id === $user->id;
    }

    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    public function update(User $user, MembershipPayment $membershipPayment): bool
    {
        return $user->isAdmin();
    }
}
