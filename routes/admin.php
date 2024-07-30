<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\BikeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\RentalController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Models\Bike;

//use App\Http\Controllers\Admin\MaintenancesController;
use App\Http\Controllers\Admin\BikeModelController;
use App\Http\Controllers\Admin\BikeTrademarkController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(static function () {

    // Guest routes
    Route::middleware('guest:admin')->group(static function () {
        Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('admin.dashboard');
        // Auth routes
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('admin.login');
        Route::post('login', [AuthenticatedSessionController::class, 'store']);
        // Forgot password
        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('admin.password.request');
        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('admin.password.email');
        // Reset password
        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('admin.password.reset');
        Route::post('reset-password', [NewPasswordController::class, 'store'])->name('admin.password.update');
    });

    // Verify email routes
    Route::middleware(['auth:admin'])->group(static function () {
        Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])->name('admin.verification.notice');
        Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('admin.verification.verify');
        Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('admin.verification.send');
    });

    // Authenticated routes
    Route::middleware(['auth:admin', 'verified'])->group(static function () {

        // General routes
        Route::get('dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
        Route::get('profile', [HomeController::class, 'profile'])->middleware('password.confirm.admin')->name('admin.profile');

        // Confirm password routes
        Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('admin.password.confirm');
        Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
        // Logout route
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');

        //users
        Route::get('users', function () {
            return view('admin.users');
        })->name('admin.users');
        Route::get('customers', function () {
            return view('admin.customers');
        })->name('admin.customers');

        //bikes
        Route::get('bikes', [BikeController::class, 'index'])->name('admin.bikes');
        Route::get('edit-bike', [BikeController::class, 'add'])->name('admin.bike.add');
        Route::get('edit-bike/{id}', [BikeController::class, 'edit'])->name('admin.bike.edit');
        Route::post('save-bike', [BikeController::class, 'save'])->name('admin.bike.save');
        Route::get('disable-bike/{id}', [BikeController::class, 'disable'])->name('admin.bike.disable');
        Route::get('enable-bike/{id}', [BikeController::class, 'enable'])->name('admin.bike.enable');

//        Route::get('brokenBikes', [BikeController::class, 'indexbrokenBikes'])->name('admin.brokenBikes');

        //models
        Route::get('models', [BikeModelController::class, 'index'])->name('admin.models');
        Route::get('add-model', [BikeModelController::class, 'add'])->name('admin.model.add');
        Route::get('edit-model/{id}', [BikeModelController::class, 'edit'])->name('admin.model.edit');
        Route::post('save-bike-model', [BikeModelController::class, 'save'])->name('admin.model.save');
        Route::get('disable-model/{id}', [BikeModelController::class, 'disable'])->name('admin.model.disable');
        Route::get('enable-model/{id}', [BikeModelController::class, 'enable'])->name('admin.model.enable');

        //trademark
        Route::get('trademarks', [BikeTrademarkController::class, 'index'])->name('admin.trademarks');
        Route::get('edit-trademark', [BikeTrademarkController::class, 'add'])->name('admin.trademark.add');
        Route::get('edit-trademark/{id}', [BikeTrademarkController::class, 'edit'])->name('admin.trademark.edit');
        Route::post('save-trademark', [BikeTrademarkController::class, 'save'])->name('admin.trademark.save');
        Route::get('disable-trademark/{id}', [BikeTrademarkController::class, 'disable'])->name('admin.trademark.disable');
        Route::get('enable-trademark/{id}', [BikeTrademarkController::class, 'enable'])->name('admin.trademark.enable');

        //materials
        Route::get('materials', [MaterialController::class, 'index'])->name('admin.materials');
        Route::get('edit-material', [MaterialController::class, 'add'])->name('admin.material.add');
        Route::get('edit-material/{id}', [MaterialController::class, 'edit'])->name('admin.material.edit');
        Route::post('save-material', [MaterialController::class, 'save'])->name('admin.material.save');
        Route::get('disable-material/{id}', [MaterialController::class, 'disable'])->name('admin.material.disable');
        Route::get('enable-material/{id}', [MaterialController::class, 'enable'])->name('admin.material.enable');

        //categories
        Route::get('categories', [CategoryController::class, 'index'])->name('admin.categories');
        Route::get('edit-category', [categoryController::class, 'add'])->name('admin.category.add');
        Route::get('edit-category/{id}', [categoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('save-category', [categoryController::class, 'save'])->name('admin.category.save');
        Route::get('disable-category/{id}', [categoryController::class, 'disable'])->name('admin.category.disable');
        Route::get('enable-category/{id}', [categoryController::class, 'enable'])->name('admin.category.enable');


        //subscriptions
        Route::get('subscriptions', [SubscriptionController::class, 'index'])->name('admin.subscriptions');
        Route::get('edit-subscription', [SubscriptionController::class, 'add'])->name('admin.subscription.add');
        Route::get('edit-subscription/{id}', [SubscriptionController::class, 'edit'])->name('admin.subscription.edit');
        Route::post('save-subscription', [SubscriptionController::class, 'save'])->name('admin.subscription.save');
        Route::get('disable-subscription/{id}', [SubscriptionController::class, 'disable'])->name('admin.subscription.disable');
        Route::get('enable-subscription/{id}', [SubscriptionController::class, 'enable'])->name('admin.subscription.enable');

        //rentals
        Route::get('rentals', [rentalController::class, 'index'])->name('admin.rentals');
//        Route::get('edit-rental', [rentalController::class, 'add'])->name('admin.rental.add');
//        Route::get('edit-rental/{id}', [rentalController::class, 'edit'])->name('admin.rental.edit');
//        Route::post('save-rental', [rentalController::class, 'save'])->name('admin.rental.save');
//        Route::get('disable-rental/{id}', [rentalController::class, 'disable'])->name('admin.rental.disable');
//        Route::get('enable-rental/{id}', [rentalController::class, 'enable'])->name('admin.rental.enable');

    });
});
