<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{BorrowingBook, BookReturn, Book, Member};

class DashboardController extends Controller
{
    public function index(){
        $member = Member::where('email', auth()->user()->email)->first();

        $peminjaman = BorrowingBook::where('member_id', $member->id)->count();
        $pengembalian = BookReturn::whereIn('borrowing_book_id', function($query) use($member){
            $query->select('id')->from('borrowing_books')->where('member_id', $member->id);
        })->count();
        
        $book = Book::count();
        $member = Member::Count();

        return view('apps.user.dashboard')->with('peminjaman', $peminjaman)
                                           ->with('pengembalian', $pengembalian)
                                           ->with('book', $book)
                                           ->with('member', $member);
    }
}
