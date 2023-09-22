<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\admin\BookController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\UserController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "admin" middleware group. Make something great!
|
*/

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');})->name('dashboard');
});

// Admin routes
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    // Dashboard Logic
    Route::get('/bookstore_admin', [AdminController::class, 'index'])->name('bookstore_admin');
    Route::get('/search', [AdminController::class, 'search'])->name('books.search');

    // Category Controller Logic
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::post('/add_category', [CategoryController::class, 'add_category'])->name('add_category');
    Route::get('/edit_category/{id}', [CategoryController::class, 'edit_category'])->name('edit_category');
    Route::post('/update_category/{id}', [CategoryController::class, 'update_category'])->name('update_category');
    Route::get('/delete_category/{id}', [CategoryController::class, 'delete_category'])->name('delete_category');

    // User Controller Logic
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/edit_user/{id}', [UserController::class, 'edit_user'])->name('edit_user');
    Route::post('/update_user/{id}', [UserController::class, 'update_user'])->name('update_user');
    Route::get('/delete_user/{id}', [UserController::class, 'delete_user'])->name('delete_user');

    // Book Controller Logic
    Route::get('/books', [BookController::class, 'index'])->name('books');
    Route::post('/add_book', [BookController::class, 'add_book'])->name('add_book');
    Route::get('/edit_book/{id}', [BookController::class, 'edit_book'])->name('edit_book');
    Route::post('/update_book/{id}', [BookController::class, 'update_book'])->name('update_book');
    Route::get('/delete_book/{id}', [BookController::class, 'delete_book'])->name('delete_book');

});
