<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MemberClass;
use Session;

class MemberClassController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q_title = $request->q_title;
        $member_class = MemberClass::orderBy('id', 'asc');
        
        if (!empty($q_title)) {
            $member_class->where('name', 'like', '%'.$q_title.'%');
        }

        $member_class = $member_class->simplePaginate(15);

        return view('apps.admin.member_class.index')->with('member_class', $member_class)
                                                    ->with('q_title', $q_title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('apps.admin.member_class.create');
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
        $member_class = MemberClass::create($data);

        Session::flash('flash_message', 'Data telah ditambah');
        return redirect()->route('admin.member_class');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MemberClass $member_class)
    {
        $member_class = MemberClass::findOrFail($member_class->id);
        
        return view('apps.admin.member_class.edit')->with('member_class', $member_class);
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
        $member_class = MemberClass::findOrFail($request->id); 
        $data = $request->all();

        $member_class->update($data);

        Session::flash('flash_message', 'Data telah diubah');
        return redirect()->route('admin.member_class');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $member_class = MemberClass::findOrFail($request->id);
        $member_class->delete();
        
        return redirect()->back();
    }
}
