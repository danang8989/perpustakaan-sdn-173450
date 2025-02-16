<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryBook;
use Session;

class CategoryBookController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q_title = $request->q_title;
        $category_book = CategoryBook::orderBy('id', 'asc');
        
        if (!empty($q_title)) {
            $category_book->where('name', 'like', '%'.$q_title.'%');
        }

        $category_book = $category_book->simplePaginate(15);

        return view('apps.admin.category_book.index')->with('category_book', $category_book)
                                                     ->with('q_title', $q_title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('apps.admin.category_book.create');
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
        $category_book = CategoryBook::create($data);

        Session::flash('flash_message', 'Data telah ditambah');
        return redirect()->route('admin.category_book');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryBook $category_book)
    {
        $category_book = CategoryBook::findOrFail($category_book->id);
        
        return view('apps.admin.category_book.edit')->with('category_book', $category_book);
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
        $category_book = CategoryBook::findOrFail($request->id); 
        $data = $request->all();

        $category_book->update($data);

        Session::flash('flash_message', 'Data telah diubah');
        return redirect()->route('admin.category_book');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $category_book = CategoryBook::findOrFail($request->id);
        $category_book->delete();
        
        return redirect()->back();
    }
}
