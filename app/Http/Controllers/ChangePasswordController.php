<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Auth;
class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
            if(!isset($request->submit))
            {
                if(Session::get('pagename')!="Change Password")
                {
                    Session::put('pagename', "Change Password");
                    Session::save();
                }
                return view("appdashboard.setting.changepassword.index");
            }
            else
            {
                $user = User::where('id',Auth::user()->id)->first();
                if(Hash::check($request->current_password, $user->password))
                {  
                    if($request->new_password== $request->confirm_password)  
                    {
                        User::where('id',Auth::user()->id)->update([
                            'password' => Hash::make($request->new_password)
                            ]);  
                            return redirect()->back()->with(['success' => 'Change Password Saved']);
                    }
                    else
                    {                 
                        return redirect()->back()->with(['failed' => 'new password and confirm password not match']);
                    }
                }
                else
                {
                    return redirect()->back()->with(['failed' => 'wrong password']);
                }
            }
    }
    
}
