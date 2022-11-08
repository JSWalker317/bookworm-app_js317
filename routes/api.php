<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\ShopController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\ReviewController;

// Public Routes
Route::post('register', [AuthController::class, 'register']);
// login logout
Route::post('session', [AuthController::class, 'login'])->name('login');
Route::delete('session', [AuthController::class, 'logout'])->name('logout');
// Home page
Route::prefix('books')->group(function () {
    Route::get('getOnSale', [BookController::class, 'getOnSale']);
    Route::get('getPopular', [BookController::class, 'getPopular']);
    Route::get('getRecommended', [BookController::class, 'getRecommended']);
});
// khong dat resource o tren
// Shop page
Route::apiResource('shop',ShopController::class)->only(['index']);;
// Product page
Route::apiResource('reviews', ReviewController::class);
Route::apiResource('orders', OrderController::class);




// Protected routes
// Route::middleware(['auth:sanctum'])->group(function () {
//     // Route::apiResource('books', BookAPIController::class);
//     // Route::delete('session', [LoginController::class, 'logout'])->name('api.logout');
//     // // 
//     // Route::post('books', [BookController::class, 'store']);
//     // Route::put('books/{id}', [BookController::class, 'update']);
//     // Route::delete('books/{id}', [BookController::class, 'destroy']);


// });

