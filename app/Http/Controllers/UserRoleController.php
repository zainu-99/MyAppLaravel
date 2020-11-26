<?php

namespace App\Http\Controllers;
use App\Models\UserRole;
use App\Models\Role;
use App\Models\Group;
use App\Models\GroupLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request,$iduser)
    {
        Session::put('pagename', "User Access");
        Session::save();
        $id_user = (isset($iduser)?$iduser:'-1');
        $id_group_level = (isset($request->id_group_level)?$request->id_group_level:'-1');
        $groupLevels = GroupLevel::select("group_level.*","groups.name")->leftJoin("groups","groups.id","group_level.id_group")->leftJoin('user_group_level','user_group_level.id_group_level','group_level.id')->where('user_group_level.id_user',$id_user)->get();
        
        $list =Role::selectRaw("roles.*,c.isview,c.isadd,c.isedit,c.isdelete,c.isprint,c.iscustom,roles.accessview,roles.accessadd,roles.accessedit,roles.accessdelete,roles.accessprint,roles.accesscustom")->leftJoin(DB::raw("(select * from user_role where id_user='".$id_user."') as b"),"b.id_role","roles.id")->leftJoin('role_group_level as c','roles.id','c.id_role')->OrderBy("roles.url")->OrderBy("roles.name")->where('c.id_group_level',$id_group_level)->whereRaw('1 in (isview,isadd,isedit,isdelete,isprint,iscustom)')->get();
        return view("appdashboard.sistemadmin.user.useraccess.index", ["list"=>$list,"groupLevels"=>$groupLevels]);
    }

    public function add(Request $request,$iduser)
    {
        $is_exist = UserRole::where('id_user',$iduser)->where('id_role',$request->id_role)->count();
        if($is_exist==0)
        {
            $tbl = new UserRole();
            $tbl->id_user = $iduser;
            $tbl->id_role = $request->id_role;
            $tbl->allow_view = $request->allow_view;
            $tbl->allow_add = $request->allow_add;
            $tbl->allow_edit = $request->allow_edit;
            $tbl->allow_delete = $request->allow_delete;
            $tbl->allow_print = $request->allow_print;
            $tbl->allow_custom = $request->allow_custom;
            $tbl->save();
            return "insert";
        }
        else
        {
            UserRole::where('id_user',$iduser)->where('id_role',$request->id_role)->update([
                'allow_view' => $request->allow_view,
                'allow_add' => $request->allow_add,
                'allow_edit' => $request->allow_edit,
                'allow_delete' => $request->allow_delete,
                'allow_print' => $request->allow_print,
                'allow_custom' => $request->allow_custom,
            ]);
            return "update";
        }
    }
}
