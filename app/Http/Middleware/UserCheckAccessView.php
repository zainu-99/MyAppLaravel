<?php

namespace App\Http\Middleware;
use App\Models\UserRole;
use App\Models\Role;
use Closure;
use Auth;
use Illuminate\Support\Facades\Session;

class UserCheckAccessView
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role_id)
    {
        $count = UserRole::leftJoin('users','user_role.id_user','users.id')
        ->where('user_role.id_role',$role_id)
        ->where('users.id',Auth::user()->id)
        ->where('user_role.allow_view',1)
        ->count();
        
        $access = UserRole::selectRaw("user_role.*")->leftJoin('users','user_role.id_user','users.id')
        ->where('user_role.id_role',$role_id)
        ->where('users.id',Auth::user()->id)
        ->first();
        Session::put('access', $access);
        Session::save();

        if($count>0)
        {
            return $next($request);
        }
        else
        {
            return redirect('/noaccess');
        }
    }
}
