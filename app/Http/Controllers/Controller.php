<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function CreateSessionMenu()
    {
        $menu = Menu::select('menu_app.*','roles.name as role_name','roles.url as role_url')->whereNull('menu_app_id')
        ->with('childrenMenus')->leftJoin('roles','menu_app.id_role','roles.id')->leftJoin('user_role','user_role.id_role','roles.id')
        ->where('user_role.id_user',Auth::user()->id)->where('user_role.allow_view',1)->orderBy('order_sort')
        ->where('user_role.allow_view',1)
        ->get();
        Session::put('menu', $menu);
    }
}
