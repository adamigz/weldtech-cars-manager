<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\CarDriverController;

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
Route::get('/', [MainController::class, 'redirect']);
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [MainController::class, 'index'])->name('dashboard');

    Route::get('/payment/create', [PaymentsController::class, 'create'])->name('createPayment');
    Route::post('/payment/create', [PaymentsController::class, 'store'])->name('create_payment');
    Route::get('/payment/{payment}', [PaymentsController::class, 'show'])->name('payment');
    Route::get('/payment/update/{payment}', [PaymentsController::class, 'edit'])->name('updatePayment');
    Route::post('/payment/update/{payment}', [PaymentsController::class, 'update'])->name('update_payment');

    Route::get('/car-driver/create', [CarDriverController::class, 'create'])->name('createCarDriver');
    Route::post('/car-driver/create', [CarDriverController::class, 'store'])->name('create_car_driver');
    Route::get('/car-driver/{car_driver}', [CarDriverController::class, 'show'])->name('carDriver');
    Route::post('/car-driver/{car_driver}', [CarDriverController::class, 'endRental']);
    Route::get('/car-driver/update/{carDriver}', [CarDriverController::class, 'edit'])->name('update_carDriver');
    Route::post('/car-driver/update/{carDriver}', [CarDriverController::class, 'update'])->name('update_car_driver');
});


require __DIR__.'/auth.php';
