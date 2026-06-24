<?php

use App\Http\Controllers\Admin\ContactMessageController as AdminContactMessageController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\MemberController as AdminMemberController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Member\DashboardController as MemberDashboardController;
use App\Http\Controllers\Member\PaymentController as MemberPaymentController;
use App\Http\Controllers\Member\ProfileController as MemberProfileController;
use App\Http\Controllers\Public\AboutController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\EventController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\LegalPageController;
use App\Http\Controllers\Teams\TeamInvitationController;
use App\Http\Middleware\EnsureTeamMembership;
use App\Http\Middleware\EnsureUserIsActive;
use App\Http\Middleware\EnsureUserIsAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('about', AboutController::class)->name('about');
Route::get('events', [EventController::class, 'index'])->name('events.index');
Route::get('events/{slug}', [EventController::class, 'show'])->name('events.show');
Route::get('contact', [ContactController::class, 'create'])->name('contact');
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('terms-of-use', [LegalPageController::class, 'terms'])->name('legal.terms');
Route::get('privacy-policy', [LegalPageController::class, 'privacy'])->name('legal.privacy');
Route::get('cookie-policy', [LegalPageController::class, 'cookies'])->name('legal.cookies');

Route::prefix('member')
    ->name('member.')
    ->middleware(['auth', EnsureUserIsActive::class])
    ->group(function (): void {
        Route::get('dashboard', MemberDashboardController::class)->name('dashboard');
        Route::get('profile', [MemberProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('profile', [MemberProfileController::class, 'update'])->name('profile.update');
        Route::get('payments', [MemberPaymentController::class, 'index'])->name('payments.index');
    });

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', EnsureUserIsActive::class, EnsureUserIsAdmin::class])
    ->group(function (): void {
        Route::get('dashboard', AdminDashboardController::class)->name('dashboard');
        Route::resource('members', AdminMemberController::class)->parameters(['members' => 'user'])->except(['destroy']);
        Route::post('members/{user}/reset-password', [AdminMemberController::class, 'resetPassword'])->name('members.reset-password');
        Route::resource('payments', AdminPaymentController::class)->except(['show', 'destroy']);
        Route::resource('events', AdminEventController::class)->except(['show', 'destroy']);
        Route::delete('events/{event}/photos/{photo}', [AdminEventController::class, 'destroyPhoto'])->name('events.photos.destroy');
        Route::patch('events/{event}/photos/sort', [AdminEventController::class, 'sortPhotos'])->name('events.photos.sort');
        Route::get('contact-messages', [AdminContactMessageController::class, 'index'])->name('contact-messages.index');
        Route::patch('contact-messages/{contactMessage}/read', [AdminContactMessageController::class, 'markAsRead'])->name('contact-messages.read');
        Route::delete('contact-messages/{contactMessage}', [AdminContactMessageController::class, 'destroy'])->name('contact-messages.destroy');
    });

Route::prefix('{current_team}')
    ->middleware(['auth', 'verified', EnsureTeamMembership::class])
    ->group(function () {
        Route::get('dashboard', DashboardController::class)->name('dashboard');
    });

Route::middleware(['auth'])->group(function () {
    Route::get('invitations/{invitation}/accept', [TeamInvitationController::class, 'accept'])->name('invitations.accept');
    Route::delete('invitations/{invitation}', [TeamInvitationController::class, 'decline'])->name('invitations.decline');
});

require __DIR__.'/settings.php';
