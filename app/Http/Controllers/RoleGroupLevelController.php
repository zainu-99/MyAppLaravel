<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\RoleGroupLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RoleGroupLevelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($idgroup)
    {
        Session::put('pagename', "Role Group");
        Session::save();
        $list =Role::selectRaw("roles.*,(SELECT '1' FROM role_group_level WHERE id_role = roles.id and id_group_level = '".$idgroup."') as isjoin")->OrderBy("url")->OrderBy("name")->get();
        return view("appdashboard.sistemadmin.grouplevel.grouprole.index", ["list"=>$list]);
    }
    public function add(Request $request,$idgroup)
    {
        if($request->is_checked == 0){
            RoleGroupLevel::where('id_role',$request->id_role)->where('id_group_level',$idgroup)->delete();
            return "<p>delete<p>";
        }
        else
        {
                RoleGroupLevel::where('id_role',$request->id_role)->where('id_group_level',$idgroup)->delete();
                $tbl = new RoleGroupLevel();
                $tbl->id_role = $request->id_role;
                $tbl->id_group_level = $idgroup;
                $tbl->save(); 
                return "<p>insert<p>";
        }
    }
}
