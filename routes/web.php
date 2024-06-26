<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'welcome']);
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/home', [HomeController::class, 'index']);



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('/users', [AdminController::class, 'index'])->name('users.index');
    Route::delete('/users/{user}', [AdminController::class, 'destroy'])->name('users.destroy');
    Route::get('/foods', [FoodController::class, 'menu'])->name('foods.menu');
    Route::post('/foods', [FoodController::class, 'store'])->name('foods.store');
    Route::get('/foods/{food}/edit', [FoodController::class, 'edit'])->name('foods.edit');
    Route::patch('/foods/{food}', [FoodController::class, 'update'])->name('foods.update');
    Route::delete('/foods/{food}', [FoodController::class, 'destroy'])->name('foods.destroy');
    Route::resource('carts', CartController::class);
    Route::resources([
        'reservations' => ReservationController::class,
        'chefs' => ChefController::class,
        'orders' => OrderController::class,
    ]);
    Route::get(
        '/ordersearch',
        [OrderController::class, 'search']

    )->name('ordersearch');
});
