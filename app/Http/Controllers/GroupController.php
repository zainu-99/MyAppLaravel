<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        Session::put('pagename', "Group Master");
        Session::save();
		$list =Group::All();
        return view("appdashboard.masterdata.group.index", ["list"=>$list]);
    }

    public function add(Request $request)
    {
       if(!isset($request->submit))
            return view("appdashboard.masterdata.group.add");
       else
       {
            $tbl = new Group();
            $tbl->name = $request->name;
            $tbl->note = $request->note;
            $tbl->save();
            return redirect($request->url().'/../');
       }
    }
    public function edit(Request $request,$id)
    {
    	if(!isset($request->submit))
       {
            $item = Group::where('id',$request->id)->first();
            return view("appdashboard.masterdata.group.edit", ["item"=>$item]);
       }
       else
       {
        Group::where('id',$request->id)->update([
                'name' => $request->name,
                'note' => $request->note
            ]);
            return redirect($request->url().'/../../');
       }
    }
    public function delete(Request $request,$id)
    {
    	Group::where('id',$request->id)->delete();
        return redirect($request->url().'/../../');
    }
}
