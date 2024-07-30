<?php

use App\Http\Controllers\Customer\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Customer\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Customer\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Customer\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Customer\Auth\NewPasswordController;
use App\Http\Controllers\Customer\Auth\PasswordResetLinkController;
use App\Http\Controllers\Customer\Auth\RegisteredUserController;
use App\Http\Controllers\Customer\Auth\VerifyEmailController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\RentalController;
use App\Http\Controllers\Customer\SubscriptionController;
use App\Http\Controllers\Customer\PlanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
*/

Route::prefix('customer')->group(function () {

    Route::middleware('guest:customer')->group(static function () {
        // Auth routes

//        Route::get('customer-login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('customer.login');
        Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('customer.validate');;

        Route::get('create', [RegisteredUserController::class, 'create'])->name('customer.register');
        Route::post('create', [RegisteredUserController::class, 'store'])->name('customer.create');
        // Forgot password
        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('customer.password.request');
        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('customer.password.email');
        // Reset password
        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
        Route::post('reset-password', [NewPasswordController::class, 'store'])->name('customer.password.update');
    });

    // Authenticated routes
    Route::middleware(['auth:customer', 'verified'])->group(static function () {
        // Confirm password routes
        Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('customer.password.confirm');
        Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
        // Logout route
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('customer.logout');
        // General routes
        Route::get('/', [HomeController::class, 'dashboard'])->name('customer.index');
        Route::get('dashboard', [HomeController::class, 'dashboard'])->name('customer.dashboard');
        Route::get('subscription', [HomeController::class, 'subscription'])->name('customer.subscription');
        Route::get('plans', [PlanController::class, 'index'])->name('customer.plans');
        Route::get('subscription-result', [PlanController::class, 'subscriptionResult'])->name('customer.subscription-result');
        Route::post('cancel-subscription/{id}', [SubscriptionController::class, 'cancel'])->name('customer.subscription.cancel');
        Route::post('resume-subscription/{id}', [SubscriptionController::class, 'resume'])->name('customer.subscription.resume');
        Route::get('profile', [HomeController::class, 'profile'])->name('customer.profile');
        Route::get('bikeModels', [RentalController::class, 'bikeModels'])->name('customer.bikeModels');
        Route::get('rentals', [RentalController::class, 'index'])->name('customer.rentals');
        Route::get('rental/{id}', [RentalController::class, 'rental'])->name('customer.rental');
        Route::post('destroy-rental/{id}', [RentalController::class, 'destroy'])->name('customer.rental.destroy');
        Route::post('store-rental', [RentalController::class, 'store'])->name('customer.rental.store');
    });
});
