<?php

use App\Http\Controllers\AuthController;
// use App\Models\Book;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\BookController;

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
// Route::get('/', function () {
//     return view('books',[
//         'heading' => 'Books',
//         'books' => Book::all()
//     ]);
// });

// Route::get('/book/{id}', function ($id) {
//     return view('book', [
//         'book' => Book::find($id)
//     ]);
// });

Route::get('/', function () {
    return view('welcome');
});

Route::view('/{path?}','welcome');




// Route::resource('books', BookController::class);

// login logout
// Route::post('session', [AuthController::class, 'store'])->name('login');
// Route::delete('session', [AuthController::class, 'destroy'])->name('logout');


