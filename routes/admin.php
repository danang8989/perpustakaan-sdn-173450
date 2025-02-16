<?php


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\MemberClassController;
use App\Http\Controllers\Admin\ShelfController;
use App\Http\Controllers\Admin\CategoryBookController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\BorrowingBookController;
use App\Http\Controllers\Admin\BookReturnController;
use App\Http\Controllers\Admin\PenaltyController;
use App\Http\Controllers\Admin\ExportBorrowingBookController;
use App\Http\Controllers\Admin\ExportBookReturnController;

Route::middleware('auth')->name('admin.')->prefix('/admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('/');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('member', [MemberController::class, 'index'])->name('member');
    Route::get('member/create', [MemberController::class, 'create'])->name('member.create');
    Route::post('member', [MemberController::class, 'insert'])->name('member.insert');
    Route::get('member/{member}', [MemberController::class, 'edit'])->name('member.edit');
    Route::put('member', [MemberController::class, 'update'])->name('member.update');
    Route::delete('member', [MemberController::class, 'delete'])->name('member.delete');

    Route::get('member_class', [MemberClassController::class, 'index'])->name('member_class');
    Route::get('member_class/create', [MemberClassController::class, 'create'])->name('member_class.create');
    Route::post('member_class', [MemberClassController::class, 'insert'])->name('member_class.insert');
    Route::get('member_class/{member_class}', [MemberClassController::class, 'edit'])->name('member_class.edit');
    Route::put('member_class', [MemberClassController::class, 'update'])->name('member_class.update');
    Route::delete('member_class', [MemberClassController::class, 'delete'])->name('member_class.delete');

    Route::get('shelf', [ShelfController::class, 'index'])->name('shelf');
    Route::get('shelf/create', [ShelfController::class, 'create'])->name('shelf.create');
    Route::post('shelf', [ShelfController::class, 'insert'])->name('shelf.insert');
    Route::get('shelf/{shelf}', [ShelfController::class, 'edit'])->name('shelf.edit');
    Route::put('shelf', [ShelfController::class, 'update'])->name('shelf.update');
    Route::delete('shelf', [ShelfController::class, 'delete'])->name('shelf.delete');

    Route::get('category_book', [CategoryBookController::class, 'index'])->name('category_book');
    Route::get('category_book/create', [CategoryBookController::class, 'create'])->name('category_book.create');
    Route::post('category_book', [CategoryBookController::class, 'insert'])->name('category_book.insert');
    Route::get('category_book/{category_book}', [CategoryBookController::class, 'edit'])->name('category_book.edit');
    Route::put('category_book', [CategoryBookController::class, 'update'])->name('category_book.update');
    Route::delete('category_book', [CategoryBookController::class, 'delete'])->name('category_book.delete');

    Route::get('book', [BookController::class, 'index'])->name('book');
    Route::get('book/create', [BookController::class, 'create'])->name('book.create');
    Route::post('book', [BookController::class, 'insert'])->name('book.insert');
    Route::get('book/{book}', [BookController::class, 'edit'])->name('book.edit');
    Route::put('book', [BookController::class, 'update'])->name('book.update');
    Route::delete('book', [BookController::class, 'delete'])->name('book.delete');

    Route::get('borrowing_book', [BorrowingBookController::class, 'index'])->name('borrowing_book');
    Route::get('borrowing_book/create', [BorrowingBookController::class, 'create'])->name('borrowing_book.create');
    Route::post('borrowing_book', [BorrowingBookController::class, 'insert'])->name('borrowing_book.insert');
    Route::get('borrowing_book/{borrowing_book}', [BorrowingBookController::class, 'edit'])->name('borrowing_book.edit');
    Route::put('borrowing_book', [BorrowingBookController::class, 'update'])->name('borrowing_book.update');
    Route::delete('borrowing_book', [BorrowingBookController::class, 'delete'])->name('borrowing_book.delete');

    Route::get('book_return', [BookReturnController::class, 'index'])->name('book_return');
    Route::get('book_return/{book_return}', [BookReturnController::class, 'edit'])->name('book_return.edit');
    Route::put('book_return', [BookReturnController::class, 'update'])->name('book_return.update');
    Route::delete('book_return', [BookReturnController::class, 'delete'])->name('book_return.delete');

    Route::get('penalty', [PenaltyController::class, 'index'])->name('penalty');

    Route::get('export_borrowing_book', [ExportBorrowingBookController::class, 'index'])->name('export_borrowing_book');
    Route::post('export_borrowing_book', [ExportBorrowingBookController::class, 'download'])->name('export_borrowing_book.download');

    Route::get('export_book_return', [ExportBookReturnController::class, 'index'])->name('export_book_return');
    Route::post('export_book_return', [ExportBookReturnController::class, 'download'])->name('export_book_return.download');

});