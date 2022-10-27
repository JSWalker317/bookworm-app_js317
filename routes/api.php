<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\ShopController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\ReviewController;


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Public Routes
Route::post('session', [LoginController::class, 'login'])->name('api.login');
// 
Route::post('register', [AuthController::class, 'register']);
// 
// Home page
Route::prefix('books')->group(function () {
    Route::get('getOnSale', [BookController::class, 'getOnSale']);
    Route::get('getPopular', [BookController::class, 'getPopular']);
    Route::get('getRecommended', [BookController::class, 'getRecommended']);


    // Route::get('{id}', [BookController::class, 'show']);
    // Route::get('filterBookByCategory/{cateId}', [BookController::class, 'filterBookByCategory']);
    // Route::get('filterBookByAuthor/{authorId}', [BookController::class, 'filterBookByAuthor']);
    // Route::get('filterRatingReviewByRT/{ratingStart}', [BookController::class, 'filterRatingReviewByRT']);
    // Route::get('mixFilterSort', [BookController::class, 'mixFilterSort']);

});
// khong dat resource o tren
Route::apiResource('books', BookController::class);
// Shop page
// Route::get('shop/{categoryName}', [ShopController::class, 'category']);

Route::apiResource('shop',ShopController::class);
// Product page
Route::apiResource('reviews', ReviewController::class);
Route::apiResource('orders', OrderController::class);
// Cart page
Route::apiResource('cards', CardController::class);
// About page
Route::apiResource('users', UserController::class);




// Protected routes
Route::middleware(['auth:sanctum'])->group(function () {
    // Route::apiResource('books', BookAPIController::class);
    // Route::delete('session', [LoginController::class, 'logout'])->name('api.logout');
    // // 
    // Route::post('books', [BookController::class, 'store']);
    // Route::put('books/{id}', [BookController::class, 'update']);
    // Route::delete('books/{id}', [BookController::class, 'destroy']);


});

