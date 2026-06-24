<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PaymentController extends Controller
{
    public function index(Request $request): Response
    {
        return Inertia::render('Member/Payments/Index', [
            'payments' => $request->user()
                ->membershipPayments()
                ->latest('paid_at')
                ->paginate(12)
                ->through(fn ($payment): array => [
                    'id' => $payment->id,
                    'month' => $payment->month,
                    'year' => $payment->year,
                    'amount' => $payment->amount,
                    'paid_at' => $payment->paid_at->toDateString(),
                    'payment_method' => $payment->payment_method,
                    'reference' => $payment->reference,
                    'notes' => $payment->notes,
                ]),
        ]);
    }
}
