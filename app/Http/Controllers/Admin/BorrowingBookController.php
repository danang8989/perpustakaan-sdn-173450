<?php

namespace App\Http\Controllers\Admin;

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
        $borrowing_book = BorrowingBook::orderBy('id', 'asc');
        
        if (!empty($q_name)) {
            $borrowing_book->whereIn('member_id', function($query) use($q_name){
                $query->select('member_id')->from('members')->where('name', 'like', '%'.$q_name.'%');
            });
        }

        $borrowing_book = $borrowing_book->simplePaginate(15);

        return view('apps.admin.borrowing_book.index')->with('borrowing_book', $borrowing_book)
                                                      ->with('q_name', $q_name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book = Book::orderBy('title', 'asc')->get();
        $member = Member::orderBy('name', 'asc')->get();

        return view('apps.admin.borrowing_book.create')->with('book', $book)->with('member', $member);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        $data = $request->all();
        $borrowing_book = BorrowingBook::create($data);

        BookReturn::create([
            'borrowing_book_id' => $borrowing_book->id,
            'total_fine' => 0,
            'is_late' => 0,
            'is_return' => 0,
            'updated_at' => null
        ]);

        Session::flash('flash_message', 'Data telah ditambah');
        return redirect()->route('admin.borrowing_book');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BorrowingBook $borrowing_book)
    {
        $borrowing_book = BorrowingBook::findOrFail($borrowing_book->id);
        $book = Book::orderBy('title', 'asc')->get();
        $member = Member::orderBy('name', 'asc')->get();

        return view('apps.admin.borrowing_book.edit')->with('book', $book)
                                                     ->with('member', $member)
                                                     ->with('borrowing_book', $borrowing_book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $borrowing_book = BorrowingBook::findOrFail($request->id); 
        $data = $request->all();

        $borrowing_book->update($data);

        // $get_book_return = BookReturn::where('borrowing_book_id', $borrowing_book->id)->findOrFail();

        // $get_book_return->update([
        //     'total_fine' => 0,
        //     'is_late' => 0,
        //     'is_return' => 0
        // ]);

        Session::flash('flash_message', 'Data telah diubah');
        return redirect()->route('admin.borrowing_book');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $borrowing_book = BorrowingBook::findOrFail($request->id);
        $get_book_return = BookReturn::where('borrowing_book_id', $borrowing_book->id)->first();

        $get_book_return->delete();
        $borrowing_book->delete();
        
        return redirect()->back();
    }
}
