<?php
namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupLevel;
use App\Models\UserGroupLevel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GroupLevelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index(Request $request)
    {
            Session::put('pagename', "Group Data");
            Session::save();
            $groups = Group::All();
            $groupLevels = GroupLevel::select("group_level.*","groups.name")->whereNull('group_level_id')
            ->with('childrenGroupsLevel')->leftJoin("groups","groups.id","group_level.id_group")
            ->get();
            $list = GroupLevel::select("group_level.*","groups.name")->whereNull('group_level_id')
            ->with('childrenGroupsLevel')->leftJoin("groups","groups.id","group_level.id_group")
            ->get();
            return view('appdashboard.sistemadmin.grouplevel.index', ["list"=>$list,"groups"=>$groups,"groupLevels"=>$groupLevels]);
    }
    public function add(Request $request)
    {
            $tbl = new GroupLevel();
            $tbl->id_group = $request->id_group;
            $tbl->group_level_id = ($request->group_level_id == -1? NULL: $request->group_level_id);
            $tbl->note = $request->note;
            $tbl->save();
            return redirect($request->url().'/../');
    }
    public function edit(Request $request,$id)
    {
    	GroupLevel::where('id',$id)->update([
            'id_group' => $request->id_group,
            'group_level_id' => ($request->group_level_id == -1? NULL: $request->group_level_id),
            'note' => $request->note
        ]);
        return redirect($request->url().'/../../');
    }
    public function delete(Request $request,$id)
    {
    	GroupLevel::where('id',$id)->delete();
        return redirect($request->url().'/../../');
    }
    
}
