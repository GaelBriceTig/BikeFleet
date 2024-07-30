<?php

use App\Http\Controllers\BikeController;
use App\Http\Controllers\Customer\PlanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/bikesList', [BikeController::class,'index'])->name('bikes');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/partners', function () {
    return view('partners');
})->name('partners');

/*Route::get('/add_bikes', function () {
    return view('add_bikes');
})->name('add_bikes');*/

Route::get('/account', function () {
    return view('account');
})->name('account');

Route::middleware("auth")->group(function () {
    Route::get('plans', [PlanController::class, 'index']);
    Route::get('plans/{plan}', [PlanController::class, 'show'])->name("plans.show");
    Route::post('subscription', [PlanController::class, 'subscription'])->name("subscription.create");
});
require __DIR__ . '/auth.php';


//Route::get('add_bikes',[BikeController::class,'add_form'] );
//Route::post('add_bikes',[BikeController::class, 'add_bike']);

Route ::get('/subscriptions', function() {
    return view('subscriptions');
});
