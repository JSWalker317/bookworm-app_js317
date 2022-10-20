<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\BookController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::get('/book/{id}', function ($id) {
//     return Book::find($id);
// });
Route::get('orders', [OrderController::class, 'index']);
Route::get('orders/{id}', [OrderController::class, 'show']);
Route::post('orders', [OrderController::class, 'store']);
Route::put('orders/{id}', [OrderController::class, 'update']);
Route::delete('orders/{id}', [OrderController::class, 'delete']);

// Public Routes
Route::post('session', [LoginController::class, 'login'])->name('api.login');
// 
Route::post('register', [AuthController::class, 'register']);
// Home page
Route::get('books', [BookController::class, 'index']);
Route::get('books/search/{str}', [BookController::class, 'search']);
Route::get('books/{id}', [BookController::class, 'show']);
Route::get('books/filterByCategory/{id}', [BookController::class, 'filterByCategory']);

// Shop page

// Product page

// Cart page

// About page





// Protected routes
Route::middleware(['auth:sanctum'])->group(function () {
    // Route::apiResource('books', BookAPIController::class);
    Route::delete('session', [LoginController::class, 'logout'])->name('api.logout');
    // 
    Route::post('books', [BookController::class, 'store']);
    Route::put('books/{id}', [BookController::class, 'update']);
    Route::delete('books/{id}', [BookController::class, 'destroy']);


});

