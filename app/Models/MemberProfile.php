<?php

namespace App\Models;

use Database\Factories\MemberProfileFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $user_id
 * @property string $full_name
 * @property string $email
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $membership_number
 * @property string|null $nic
 * @property Carbon|null $date_of_birth
 * @property string|null $occupation
 * @property string|null $account_name
 * @property string|null $bank_name
 * @property string|null $branch
 * @property string|null $account_number
 */
#[Fillable([
    'user_id',
    'full_name',
    'email',
    'phone',
    'address',
    'membership_number',
    'nic',
    'date_of_birth',
    'occupation',
    'account_name',
    'bank_name',
    'branch',
    'account_number',
])]
class MemberProfile extends Model
{
    /** @use HasFactory<MemberProfileFactory> */
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
            'account_name' => 'encrypted',
            'bank_name' => 'encrypted',
            'branch' => 'encrypted',
            'account_number' => 'encrypted',
        ];
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
