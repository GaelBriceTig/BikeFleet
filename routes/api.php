<?php

use App\Http\Controllers\Admin\BikeTrademarkController;
use App\Http\Controllers\Api\BikeController;
use App\Http\Controllers\Api\BikeModelController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\MaterialController;
use App\Http\Controllers\Api\RentalController;
use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\Api\TrademarkController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:admin', 'verified'])->group(static function () {

    Route::get('bikes', [BikeController::class, 'index'])->name('api.bikes');
    Route::get('bikes-with-disabled', [BikeController::class, 'bikesWithDisabled'])->name('api.bikes.show-disabled');

    Route::get('models', [BikeModelController::class, 'index'])->name('api.models');
    Route::get('models-with-disabled', [BikeModelController::class, 'modelsWithDisabled'])->name('api.models.show-disabled');

    Route::get('trademarks', [TrademarkController::class, 'index'])->name('api.trademarks');
    Route::get('trademarks-with-disabled', [TrademarkController::class, 'trademarksWithDisabled'])->name('api.trademarks.show-disabled');

    Route::get('materials', [MaterialController::class, 'index'])->name('api.materials');
    Route::get('materials-with-disabled', [MaterialController::class, 'materialsWithDisabled'])->name('api.materials.show-disabled');

    Route::get('categories', [CategoryController::class, 'index'])->name('api.categories');
    Route::get('categories-with-disabled', [CategoryController::class, 'categoriesWithDisabled'])->name('api.categories.show-disabled');

    Route::get('subscriptions', [SubscriptionController::class, 'index'])->name('api.subscriptions');
    Route::get('subscriptions-with-disabled', [SubscriptionController::class, 'subscriptionsWithInactive'])->name('api.subscriptions.show-disabled');


    Route::get('rentals', [RentalController::class, 'index'])->name('api.rentals');
    Route::get('rentals-with-disabled', [RentalController::class, 'rentalsWithCancelled'])->name('api.rentals.show-disabled');


});

