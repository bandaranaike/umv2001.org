<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMembershipPaymentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isAdmin() === true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $payment = $this->route('payment');

        return [
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'month' => ['required', 'integer', 'between:1,12'],
            'year' => ['required', 'integer', 'between:2001,2100'],
            'amount' => ['required', 'numeric', 'min:0'],
            'paid_at' => ['required', 'date'],
            'payment_method' => ['required', 'string', 'max:100'],
            'reference' => ['nullable', 'string', 'max:255'],
            'notes' => ['nullable', 'string', 'max:1000'],
            'user_id_month_year' => [
                Rule::unique('membership_payments', 'user_id')
                    ->ignore($payment?->id)
                    ->where('month', $this->integer('month'))
                    ->where('year', $this->integer('year'))
                    ->whereNull('deleted_at'),
            ],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge(['user_id_month_year' => $this->input('user_id')]);
    }
}
