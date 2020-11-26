<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Models\Role;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){   
    $list = Role::selectRaw('roles.url,roles.controller,roles.name,user_role.id')->whereNotNull('url')->leftJoin('user_role','user_role.id_role','roles.id')->where('user_role.allow_view',1)->leftJoin('users','users.id','user_role.id_user')->get();
    foreach($list as $item)
    {
        Route::match(['get', 'post'],$item->url.'', $item->controller.'Controller@index')->name($item->name)->middleware('UserCheckAccessView:'.$item->id);
        Route::match(['get', 'post'],$item->url.'/add', $item->controller.'Controller@add')->name($item->name)->middleware('UserCheckAccessAdd:'.$item->id);
        Route::match(['get', 'post'],$item->url.'/edit/{id}', $item->controller.'Controller@edit')->name($item->name)->middleware('UserCheckAccessEdit:'.$item->id);
        Route::match(['get', 'post'],$item->url.'/delete/{id}', $item->controller.'Controller@delete')->name($item->name)->middleware('UserCheckAccessDelete:'.$item->id);
        Route::match(['get', 'post'],$item->url.'/print', $item->controller.'Controller@print')->name($item->name)->middleware('UserCheckAccessPrint:'.$item->id);
        Route::match(['get', 'post'],$item->url.'/custom', $item->controller.'Controller@custom')->name($item->name)->middleware('UserCheckAccessCustom:'.$item->id);
    }
});


