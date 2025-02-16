<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{BookReturn, BorrowingBook};
use Session;
use Carbon\Carbon;

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
        $book_return = BookReturn::orderBy('id', 'asc');
        
        if (!empty($q_name)) {
            $book_return->whereIn('borrowing_book_id', function($query) use($q_name){
                $query->select('id')->from('borrowing_books')->whereIn('member_id', function($member) use($q_name) {
                    $member->select('id')->from('members')->where('name', 'like', '%'.$q_name.'%');
                });
            });
        }

        $book_return = $book_return->simplePaginate(15);

        return view('apps.admin.book_return.index')->with('book_return', $book_return)
                                                    ->with('q_name', $q_name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BookReturn $book_return)
    {
        return view('apps.admin.book_return.edit')->with('book_return', $book_return);
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
        $book_return = BookReturn::findOrFail($request->id); 
        $borrowing_book = BorrowingBook::findOrFail($book_return->borrowing_book_id);
        $data = $request->all();

        // ambil tanggal updated_at sama tanggal hari ini. hitung berapa jauh harinya
        // kalikan dengan 1000
        $until_date = Carbon::createFromFormat('Y-m-d', $borrowing_book->until_date);
        $expired_date = Carbon::createFromFormat('Y-m-d', date('Y-m-d'));

        $diff_in_days = $until_date->diffInDays($expired_date);
        $fine_total = 0;
        $is_late = 0;

        if ($diff_in_days > 0) {
            $fine_total = $diff_in_days * 1000;
            $is_late = 1;
        }

        $book_return->update([
            'is_return' => 1,
            'is_late' => $is_late,
            'total_fine' => $fine_total
        ]);

        Session::flash('flash_message', 'Data telah diubah');
        return redirect()->route('admin.book_return');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $book_return = BookReturn::findOrFail($request->id);
        $book_return->delete();
        
        return redirect()->back();
    }
}
