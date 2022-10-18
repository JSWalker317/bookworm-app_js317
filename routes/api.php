<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\API\BookAPIController;

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


// Public Routes
Route::post('session', [LoginController::class, 'login'])->name('api.login');
// 
Route::post('register', [AuthController::class, 'register']);
// 
Route::get('books', [BookAPIController::class, 'index']);
Route::get('books/search/{str}', [BookAPIController::class, 'search']);
Route::get('books/{id}', [BookAPIController::class, 'show']);




// Protected routes
Route::middleware(['auth:sanctum'])->group(function () {
    // Route::apiResource('books', BookAPIController::class);
    Route::delete('session', [LoginController::class, 'logout'])->name('api.logout');
    // 
    Route::post('books', [BookAPIController::class, 'store']);
    Route::put('books/{id}', [BookAPIController::class, 'update']);
    Route::delete('books/{id}', [BookAPIController::class, 'destroy']);


});

