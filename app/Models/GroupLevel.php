<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupLevel extends Model
{
    protected $table = "group_level";

    public function GroupsLevel()
    {
        return $this->hasMany(GroupLevel::class)->selectRaw("groups.name,group_level.*,(SELECT '1' FROM user_group_level WHERE id_group_level = group_level.id ) as isjoin")->leftJoin("groups","groups.id","group_level.id_group");
    }

    public function ChildrenGroupsLevel()
    {
        return $this->hasMany(GroupLevel::class)->selectRaw("groups.name,group_level.*,(SELECT '1' FROM user_group_level WHERE id_group_level = group_level.id ) as isjoin")->leftJoin("groups","groups.id","group_level.id_group" )->with('GroupsLevel');
    }
}
