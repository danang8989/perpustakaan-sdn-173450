<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{BorrowingBook, Book, Member, BookReturn};
use Session;

class BorrowingBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q_name = $request->q_name;
        $member = Member::where('email', auth()->user()->email)->first();
        $borrowing_book = BorrowingBook::where('member_id', $member->id)->orderBy('id', 'asc');
        
        if (!empty($q_name)) {
            $borrowing_book->whereIn('member_id', function($query) use($q_name){
                $query->select('member_id')->from('members')->where('name', 'like', '%'.$q_name.'%');
            });
        }

        $borrowing_book = $borrowing_book->simplePaginate(15);

        return view('apps.user.borrowing_book.index')->with('borrowing_book', $borrowing_book)
                                                      ->with('q_name', $q_name);
    }
}
