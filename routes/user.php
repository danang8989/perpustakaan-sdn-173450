<?php


use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\BookController;
use App\Http\Controllers\User\BorrowingBookController;
use App\Http\Controllers\User\BookReturnController;

Route::middleware('auth')->name('user.')->prefix('/user')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('/');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('book', [BookController::class, 'index'])->name('book');

    Route::get('borrowing_book', [BorrowingBookController::class, 'index'])->name('borrowing_book');

    Route::get('book_return', [BookReturnController::class, 'index'])->name('book_return');
});