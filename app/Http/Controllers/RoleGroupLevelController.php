<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\RoleGroupLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $list =Role::selectRaw("roles.*,b.isview,b.isadd,b.isedit,b.isdelete,b.isprint,b.iscustom")->leftJoin(DB::raw("(select * from role_group_level where id_group_level='".$idgroup."') as b"),"b.id_role","roles.id")->OrderBy("url")->OrderBy("name")->get();        
        return view("appdashboard.sistemadmin.grouplevel.grouprole.index", ["list"=>$list]);
    }
    public function add(Request $request,$idgroup)
    {
        $is_exist = RoleGroupLevel::where('id_group_level',$idgroup)->where('id_role',$request->id_role)->count();
        if($is_exist==0)
        {
            $tbl = new RoleGroupLevel();
            $tbl->id_group_level = $idgroup;
            $tbl->id_role = $request->id_role;
            $tbl->isview = $request->isview;
            $tbl->isadd = $request->isadd;
            $tbl->isedit = $request->isedit;
            $tbl->isdelete = $request->isdelete;
            $tbl->isprint = $request->isprint;
            $tbl->iscustom = $request->iscustom;
            $tbl->save();
            return "insert";
        }
        else
        {
            RoleGroupLevel::where('id_group_level',$idgroup)->where('id_role',$request->id_role)->update([
                'isview' => $request->isview,
                'isadd' => $request->isadd,
                'isedit' => $request->isedit,
                'isdelete' => $request->isdelete,
                'isprint' => $request->isprint,
                'iscustom' => $request->iscustom,
            ]);
            return "update";
        }
    }
}
