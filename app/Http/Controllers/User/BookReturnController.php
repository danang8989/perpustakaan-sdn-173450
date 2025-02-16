<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Member, BookReturn};

class BookReturnController extends Controller
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
        $book_return = BookReturn::whereIn('borrowing_book_id', function($query) use($member){
            $query->select('id')->from('borrowing_books')->where('member_id', $member->id);
        })->orderBy('id', 'asc');
        
        if (!empty($q_name)) {
            $book_return->whereIn('borrowing_book_id', function($query) use($q_name){
                $query->select('id')->from('borrowing_books')->whereIn('member_id', function($member) use($q_name) {
                    $member->select('id')->from('members')->where('name', 'like', '%'.$q_name.'%');
                });
            });
        }

        $book_return = $book_return->simplePaginate(15);

        return view('apps.user.book_return.index')->with('book_return', $book_return)
                                                    ->with('q_name', $q_name);
    }
}
