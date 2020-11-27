<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use DataTables;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function apigetusers()
    {
        return Datatables::of(User::selectRaw('*')->get())->make(true);
    }
    public function index(Request $request)
    {
        Session::put('pagename', "User Data");
        Session::save();
		$list =User::All();
        return view("appdashboard.sistemadmin.user.index", ["list"=>$list]);
    }
    public function add(Request $request)
    {
       if(!isset($request->submit)) return view("appdashboard.sistemadmin.user.add");
       else
       {
            $tbl = new User();
            $tbl->userid = $request->userid;
            $tbl->name = $request->name;
            $tbl->email = $request->email;
            $tbl->no_hp = $request->no_hp;
            $tbl->address = $request->address;
            $tbl->gender = $request->gender;
            $tbl->status = 1;
            $tbl->password = Hash::make($request->password);
            $tbl->save();
            return redirect($request->url().'/../');
       }
    }
    public function edit(Request $request,$id)
    {
        if(!isset($request->reset_pass))
        {
            if(!isset($request->submit))
            {
                    $item = User::where('id',$id)->first();
                    return view("appdashboard.sistemadmin.user.edit", ["item"=>$item]);
            }
            else
            {
                    User::where('id',$id)->update([
                        'userid' => $request->userid,
                        'name' => $request->name,
                        'email' => $request->email,
                        'no_hp' => $request->no_hp,
                        'address' => $request->address,
                        'gender' => $request->gender,
                        'status' => 1
                    ]);
                    return redirect($request->url().'/../../');
            }
        }
        else
        {
            User::where('id',$id)->update([
                'password' => Hash::make('admin')
            ]);
            return "Success";
        }
    }
    public function delete(Request $request,$id)
    {
    	User::where('id',$request->id)->delete();
        return redirect($request->url().'/../../');
    }  
}
