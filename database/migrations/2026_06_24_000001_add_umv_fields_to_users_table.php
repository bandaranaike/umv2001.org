<?php

use App\Enums\UserRole;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            $table->string('role')->default(UserRole::Member->value)->after('password')->index();
            $table->string('membership_number')->nullable()->unique()->after('role');
            $table->string('phone')->nullable()->after('membership_number');
            $table->text('address')->nullable()->after('phone');
            $table->boolean('is_active')->default(true)->after('address')->index();
            $table->date('joined_at')->nullable()->after('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            $table->dropColumn([
                'role',
                'membership_number',
                'phone',
                'address',
                'is_active',
                'joined_at',
            ]);
        });
    }
};
