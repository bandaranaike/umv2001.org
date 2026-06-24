<?php

namespace App\Http\Requests\Member;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMemberProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->user()?->id)],
            'phone' => ['nullable', 'string', 'max:30'],
            'address' => ['nullable', 'string', 'max:1000'],
            'nic' => ['nullable', 'string', 'max:30'],
            'date_of_birth' => ['nullable', 'date'],
            'occupation' => ['nullable', 'string', 'max:255'],
            'account_name' => ['nullable', 'string', 'max:255'],
            'bank_name' => ['nullable', 'string', 'max:255'],
            'branch' => ['nullable', 'string', 'max:255'],
            'account_number' => ['nullable', 'string', 'max:100'],
            'family_members' => ['array'],
            'family_members.*.id' => ['nullable', 'integer'],
            'family_members.*.relationship' => ['required_with:family_members.*.name', Rule::in(['mother', 'father', 'spouse', 'child', 'other'])],
            'family_members.*.name' => ['nullable', 'string', 'max:255'],
            'family_members.*.phone' => ['nullable', 'string', 'max:30'],
            'family_members.*.date_of_birth' => ['nullable', 'date'],
            'family_members.*.notes' => ['nullable', 'string', 'max:1000'],
        ];
    }
}
