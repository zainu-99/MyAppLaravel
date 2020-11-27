<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Session;
class ChangeProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
            if(!isset($request->submit))
            {
                if(Session::get('pagename')!="Change Profile")
                {
                    Session::put('pagename', "Change Profile");
                    Session::save();
                }
                $item = User::where('id',1)->first();
                return view("appdashboard.setting.changeprofile.index", ["item"=>$item]);
            }
            else
            {
                User::where('id',Auth::user()->id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'no_hp' => $request->no_hp,
                    'address' => $request->address,
                    'gender' => $request->gender,
                    'status' => 1
                ]);
                return redirect()->back()->with(['success' => 'Change Profile Saved']);
            }
    }
}
