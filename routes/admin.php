<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');})->name('dashboard');
});

// Admin routes
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/bookstore_admin', [AdminController::class, 'index'])->name('bookstore_admin');
});
