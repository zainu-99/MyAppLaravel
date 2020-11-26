<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\RoleGroupLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        Session::put('pagename', "Role Master");
        Session::save();
        $list =Role::OrderBy("url")->OrderBy("name")->get();
        return view("appdashboard.masterdata.role.index", ["list"=>$list]);
    }

    public function add(Request $request)
    {
        if(!isset($request->submit)) return view("appdashboard.masterdata.role.add");
        else
        {
            if (Role::where('name',$request->name)->count() > 0)return redirect()->back()->with(['error' => 'Role Name Exist']);
            $tbl = new Role();
            $tbl->name = $request->name;
            $tbl->note = $request->note;
            $tbl->url = $request->url;
            $tbl->controller = $request->controller;
            $tbl->accessview = (isset($request->accessview)?1:0);
            $tbl->accessadd = (isset($request->accessadd)?1:0);
            $tbl->accessedit = (isset($request->accessedit)?1:0);
            $tbl->accessdelete = (isset($request->accessdelete)?1:0);
            $tbl->accessprint = (isset($request->accessprint)?1:0);
            $tbl->accesscustom = (isset($request->accesscustom)?1:0);
            $tbl->save();
            return redirect($request->url().'/../');
        }
    }
    public function edit(Request $request,$id)
    {
    	if(!isset($request->submit))
        {
            $item = Role::where('id',$request->id)->first();
            return view("appdashboard.masterdata.role.edit", ["item"=>$item]);
       }
       else
       {
            $role = Role::where('name',$request->name)->first();
            if (!is_null($role)) if($role->id != $request->id)  return redirect()->back()->with(['error' => 'Role Name Exist']);
            Role::where('id',$request->id)->update([
                'name' => $request->name,
                'note' => $request->note,   
                'url' => $request->url,         
                'controller' => $request->controller,
                'accessview' => (isset($request->accessview)?1:0),
                'accessadd' => (isset($request->accessadd)?1:0),
                'accessedit' => (isset($request->accessedit)?1:0),
                'accessdelete' => (isset($request->accessdelete)?1:0),
                'accessprint' => (isset($request->accessprint)?1:0),
                'accesscustom' => (isset($request->accesscustom)?1:0)
            ]);
            return redirect($request->url().'/../../');
       }
    }
    public function delete(Request $request,$id)
    {
    	Role::where('id',$request->id)->delete();
        return redirect($request->url().'/../../');
    }
}
