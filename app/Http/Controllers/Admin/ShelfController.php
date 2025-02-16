<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shelf;
use Session;

class ShelfController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q_title = $request->q_title;
        $shelf = Shelf::orderBy('id', 'asc');
        
        if (!empty($q_title)) {
            $shelf->where('name', 'like', '%'.$q_title.'%');
        }

        $shelf = $shelf->simplePaginate(15);

        return view('apps.admin.shelf.index')->with('shelf', $shelf)
                                                    ->with('q_title', $q_title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('apps.admin.shelf.create');
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
        $shelf = Shelf::create($data);

        Session::flash('flash_message', 'Data telah ditambah');
        return redirect()->route('admin.shelf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Shelf $shelf)
    {
        $shelf = Shelf::findOrFail($shelf->id);
        
        return view('apps.admin.shelf.edit')->with('shelf', $shelf);
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
        $shelf = Shelf::findOrFail($request->id); 
        $data = $request->all();

        $shelf->update($data);

        Session::flash('flash_message', 'Data telah diubah');
        return redirect()->route('admin.shelf');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $shelf = Shelf::findOrFail($request->id);
        $shelf->delete();
        
        return redirect()->back();
    }
}
