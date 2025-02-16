<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Member, MemberClass, User};
use Session;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $q_title = $request->q_title;
        $member = Member::orderBy('id', 'asc');
        
        if (!empty($q_title)) {
            $member->where('title', 'like', '%'.$q_title.'%');
        }

        $member = $member->simplePaginate(15);

        return view('apps.admin.member.index')->with('member', $member)
                                              ->with('q_title', $q_title);
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $member_class = MemberClass::get();

        return view('apps.admin.member.create')->with('member_class', $member_class);
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

        $data['email'] = $request->nisn.'_'.$request->name.'@gmail.com';

        $member = Member::create($data);

        User::create([
            'name' => $member->name,
            'user_level' => 'User',
            'email' => $request->nisn.'_'.$request->name.'@gmail.com',
            'password' => Hash::make($request->nisn),
        ]);

        Session::flash('flash_message', 'Data telah ditambah');
        return redirect()->route('admin.member');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        $member = Member::findOrFail($member->id);
        $member_class = MemberClass::get();
        
        return view('apps.admin.member.edit')->with('member', $member)->with('member_class', $member_class);
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
        $member = Member::findOrFail($request->id); 
        $data = $request->all();

        $member->update($data);

        Session::flash('flash_message', 'Data telah diubah');
        return redirect()->route('admin.member');
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $member = Member::findOrFail($request->id);
        $member->delete();
        
        return redirect()->back();
    }

}
