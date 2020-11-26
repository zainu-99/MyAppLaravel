<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupLevel extends Model
{
    protected $table = "group_level";

    public function GroupsLevel()
    {
        $id_user = (!isset($_GET['id_user'])?'-1':$_GET['id_user']);
        return $this->hasMany(GroupLevel::class)->selectRaw("groups.name,group_level.*,(SELECT '1' FROM user_group_level WHERE id_group_level = group_level.id and id_user = '".$id_user."') as isjoin")->leftJoin("groups","groups.id","group_level.id_group");
    }

    public function childrenGroupsLevel()
    {
        $id_user = (!isset($_GET['id_user'])?'-1':$_GET['id_user']);
        return $this->hasMany(GroupLevel::class)->selectRaw("groups.name,group_level.*,(SELECT '1' FROM user_group_level WHERE id_group_level = group_level.id and id_user = '".$id_user."') as isjoin")->leftJoin("groups","groups.id","group_level.id_group" )->with('GroupsLevel');
    }
}
