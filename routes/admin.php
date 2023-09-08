<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\admin\CategoryController;

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
    // Category Logic
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::post('/add_category', [CategoryController::class, 'add_category'])->name('add_category');
    Route::get('/edit_category/{id}', [CategoryController::class, 'edit_category'])->name('edit_category');
    Route::post('/update_category/{id}', [CategoryController::class, 'update_category'])->name('update_category');
    Route::get('/delete_category/{id}', [CategoryController::class, 'delete_category'])->name('delete_category');
});
