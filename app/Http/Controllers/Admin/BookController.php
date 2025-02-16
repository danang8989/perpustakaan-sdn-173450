<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Book, CategoryBook, Shelf};
use Session;

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

        return view('apps.admin.book.index')->with('book', $book)
                                                    ->with('q_title', $q_title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shelf = Shelf::orderBy('id', 'desc')->get();
        $category_book = CategoryBook::orderBy('name', 'asc')->get();

        return view('apps.admin.book.create')->with('shelf', $shelf)->with('category_book', $category_book);
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
        $book = Book::create($data);

        Session::flash('flash_message', 'Data telah ditambah');
        return redirect()->route('admin.book');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $book = Book::findOrFail($book->id);
        $shelf = Shelf::orderBy('id', 'desc')->get();
        $category_book = CategoryBook::orderBy('name', 'asc')->get();
        
        return view('apps.admin.book.edit')->with('book', $book)->with('shelf', $shelf)->with('category_book', $category_book);
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
        $book = Book::findOrFail($request->id); 
        $data = $request->all();

        $book->update($data);

        Session::flash('flash_message', 'Data telah diubah');
        return redirect()->route('admin.book');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $book = Book::findOrFail($request->id);
        $book->delete();
        
        return redirect()->back();
    }
}
