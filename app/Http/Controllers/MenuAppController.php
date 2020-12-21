<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\MenuApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class MenuAppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        Session::put('pagename', "Menu Master");
        Session::save();
        $menu = MenuApp::select('menu_app.*','roles.name as role_name','roles.url as role_url')->whereNull('menu_app_id')
        ->with('childrenMenus')->leftJoin('roles','menu_app.id_role','roles.id')->orderBy('order_sort')
        ->get();
        return view("appdashboard.masterdata.menu.index", compact('menu'));
    }

    public function add(Request $request)
    {
       if(!isset($request->submit))
       {
            $roles =Role::orderBy('name')->get();
            $parents = MenuApp::select('menu_app.*','roles.name as role_name','roles.url as role_url')->whereNull('menu_app_id')
            ->with('childrenMenus')->leftJoin('roles','menu_app.id_role','roles.id')->orderBy('order_sort')
            ->get();
            return view("appdashboard.masterdata.menu.add", ["roles"=>$roles,"parents"=>$parents]);
       }
       else
       {
            $tbl = new MenuApp();
            $tbl->id_role = $request->id_role;
            $tbl->menu_text = $request->menu_text;
            $tbl->menu_app_id = ($request->id_parent == "-"? NULL: $request->id_parent); 
            $tbl->icon = $request->icon;
            $tbl->order_sort =$request->order_sort;
            $tbl->save();
            return redirect($request->url().'/../');
       }
    }
    public function edit(Request $request,$id)
    {
        if(!isset($request->submit))
       {
            $roles =Role::orderBy('name')->get();
            $item = MenuApp::where('id',$request->id)->first();
            $parents = MenuApp::select('menu_app.*','roles.name as role_name','roles.url as role_url')->whereNull('menu_app_id')
            ->with('childrenMenus')->leftJoin('roles','menu_app.id_role','roles.id')->orderBy('order_sort')
            ->get();
            return view("appdashboard.masterdata.menu.edit", ["item"=>$item,"roles"=>$roles,"parents"=>$parents]);
       }
       else
       {
        MenuApp::where('id',$request->id)->update([
                'id_role' => $request->id_role,
                'menu_text' => $request->menu_text,
                'menu_app_id' => ($request->id_parent == "-"? NULL: $request->id_parent),
                'icon' => $request->icon,
                'order_sort' => $request->order_sort
            ]);
            return redirect($request->url().'/../../');
       }
    }
    public function delete(Request $request,$id)
    {
    	MenuApp::where('id',$request->id)->delete();
        return redirect($request->url().'/../../');
    }
}
