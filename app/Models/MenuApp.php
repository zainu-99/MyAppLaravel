<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
class MenuApp extends Model
{
    protected $table = "menu_app";

    public function Menus()
    {
        return $this->hasMany(Menu::class,'menu_app_id')->select('menu_app.*','roles.name as role_name','roles.url as role_url')->leftJoin('roles','menu_app.id_role','roles.id')->orderBy('order_sort');
    }

    public function childrenMenus()
    {
        return $this->hasMany(Menu::class,'menu_app_id')->select('menu_app.*','roles.name as role_name','roles.url as role_url')->leftJoin('roles','menu_app.id_role','roles.id')->orderBy('order_sort')->with('Menus');
    }
}
