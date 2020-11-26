<?php

namespace App\Http\Middleware;
use App\Models\UserRole;
use App\Models\Role;
use Closure;
use Auth;

class UserCheckAccessView
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $id_user_role)
    {
        $count = UserRole::leftJoin('users','user_role.id_user','users.id')
        ->where('user_role.id',$id_user_role)
        ->where('users.id',Auth::user()->id)
        ->where('user_role.allow_view',1)
        ->count();
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
