<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{BorrowingBook, BookReturn, Book, Member};

class DashboardController extends Controller
{
    public function index(){
        $peminjaman = BorrowingBook::count();
        $pengembalian = BookReturn::count();
        $book = Book::count();
        $member = Member::Count();

        return view('apps.admin.dashboard')->with('peminjaman', $peminjaman)
                                           ->with('pengembalian', $pengembalian)
                                           ->with('book', $book)
                                           ->with('member', $member);
    }
}
