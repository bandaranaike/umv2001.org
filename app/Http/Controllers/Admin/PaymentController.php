<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMembershipPaymentRequest;
use App\Http\Requests\Admin\UpdateMembershipPaymentRequest;
use App\Models\MembershipPayment;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PaymentController extends Controller
{
    public function index(Request $request): Response
    {
        return Inertia::render('Admin/Payments/Index', [
            'filters' => $request->only(['user_id', 'month', 'year']),
            'members' => $this->memberOptions(),
            'payments' => MembershipPayment::query()
                ->with('user:id,name,membership_number')
                ->when($request->filled('user_id'), fn ($query) => $query->where('user_id', $request->integer('user_id')))
                ->when($request->filled('month'), fn ($query) => $query->where('month', $request->integer('month')))
                ->when($request->filled('year'), fn ($query) => $query->where('year', $request->integer('year')))
                ->latest('paid_at')
                ->paginate(15)
                ->withQueryString()
                ->through(fn (MembershipPayment $payment): array => $this->paymentData($payment)),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Payments/Create', [
            'members' => $this->memberOptions(),
        ]);
    }

    public function store(StoreMembershipPaymentRequest $request): RedirectResponse
    {
        MembershipPayment::query()->create([
            ...$request->safe()->except('user_id_month_year'),
            'recorded_by' => $request->user()->id,
        ]);

        return to_route('admin.payments.index')
            ->with('toast', ['type' => 'success', 'message' => 'Payment recorded.']);
    }

    public function edit(MembershipPayment $payment): Response
    {
        return Inertia::render('Admin/Payments/Edit', [
            'payment' => $this->paymentData($payment->load('user:id,name,membership_number')),
            'members' => $this->memberOptions(),
        ]);
    }

    public function update(UpdateMembershipPaymentRequest $request, MembershipPayment $payment): RedirectResponse
    {
        $payment->update($request->safe()->except('user_id_month_year'));

        return to_route('admin.payments.index')
            ->with('toast', ['type' => 'success', 'message' => 'Payment updated.']);
    }

    /**
     * @return list<array{id: int, name: string, membership_number: string|null}>
     */
    private function memberOptions(): array
    {
        return User::query()
            ->where('role', UserRole::Member)
            ->orderBy('name')
            ->get(['id', 'name', 'membership_number'])
            ->all();
    }

    /**
     * @return array<string, mixed>
     */
    private function paymentData(MembershipPayment $payment): array
    {
        return [
            'id' => $payment->id,
            'user_id' => $payment->user_id,
            'member_name' => $payment->user?->name,
            'membership_number' => $payment->user?->membership_number,
            'month' => $payment->month,
            'year' => $payment->year,
            'amount' => $payment->amount,
            'paid_at' => $payment->paid_at->toDateString(),
            'payment_method' => $payment->payment_method,
            'reference' => $payment->reference,
            'notes' => $payment->notes,
        ];
    }
}
