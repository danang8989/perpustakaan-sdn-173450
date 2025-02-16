<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q_title = $request->q_title;
        $book = Book::orderBy('id', 'asc');
        
        if (!empty($q_title)) {
            $book->where('title', 'like', '%'.$q_title.'%');
        }

        $book = $book->simplePaginate(15);

        return view('apps.user.book.index')->with('book', $book)
                                            ->with('q_title', $q_title);
    }
}
