<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\WebController;
use App\Http\Controllers\Web\BookController;
use App\Http\Controllers\web\NewsletterController;

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
Route::get('/web_search', [WebController::class, 'search'])->name('web.books.search');
Route::get('/all_books', [BookController::class, 'allBooks'])->name('all.books');
Route::get('/all_rated_books', [BookController::class, 'allRatedBooks'])->name('all.rated.books');
Route::post('/subscribe', [NewsletterController::class, 'store'])->name('newsletter.subscribe');
