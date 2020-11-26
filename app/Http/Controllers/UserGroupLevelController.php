<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\GroupLevel;
use App\Models\UserGroupLevel;
use Illuminate\Support\Facades\Session;

class UserGroupLevelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($iduser)
    {
        Session::put('pagename', "User Group");
        Session::save();
        $list =GroupLevel::selectRaw("groups.name,group_level.*,(SELECT '1' FROM user_group_level WHERE id_group_level = group_level.id and id_user = '".$iduser."') as isjoin")->whereNull('group_level_id')
            ->with('childrenGroupsLevel')->leftJoin("groups","groups.id","group_level.id_group")
            ->get();
        return view('appdashboard.sistemadmin.user.usergroup.index', ["list"=>$list]);
    }
    public function add(Request $request,$iduser)
    {
            if($request->is_checked == 0)
            {
                UserGroupLevel::where('id_user',$iduser)->where('id_group_level',$request->id_group_level)->delete();
                return "<p>Delete<p>";
            }
            else
            {
                UserGroupLevel::where('id_user',$iduser)->where('id_group_level',$request->id_group_level)->delete();
                $tbl = new UserGroupLevel();
                $tbl->id_user = $iduser;
                $tbl->id_group_level = $request->id_group_level;
                $tbl->save(); 
                return "<p>Insert<p>";
            }
    }
}
