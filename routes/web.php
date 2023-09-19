<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\WebController;
use App\Http\Controllers\Web\BookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Web routes
Route::get('/', [WebController::class, 'index'])->name('bookstore');
Route::get('/category/{id}', [WebController::class, 'showCategoryBooks'])->name('categories.books');
Route::get('/book/{id}', [WebController::class, 'bookDetails'])->name('book.details');
Route::post('/rate_book/{bookId}', [BookController::class, 'rateBook'])->name('rate.book');
