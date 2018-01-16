<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Auth;
class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth'); 

    }

    public function index(Request $request)
    {
        if($request->has('search')){
            $members = Member::search($request->search)
                ->paginate(6);
        }else{
            $members = Member::paginate(6);
        }
        return view('members.index',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     
    public function store(Request $request)
    {
        Member::create($request->all());
        return redirect()->route('members.index')->with('success','Member created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $members = Member::find($id);
        return view('members.edit', compact('members'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $colum = $request->colum;
        $val = $request->val;
        if ($colum=='first_name') {
            $member = Member::find($id);
            $member->first_name = $val;
        }
        if ($colum=='surname') {
            $member = Member::find($id);
            $member->surname = $val;
        }
        if ($colum=='email') {
            $member = Member::find($id);
            $member->email = $val;
            
        }
        $member->update();
        echo "Member updated successfully";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Member::find($id)->delete();
        return redirect()->route('members.index')->with('success','Member delete successfully');;
    }
}
