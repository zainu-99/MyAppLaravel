@php 
use App\Models\Role;
use Illuminate\Support\Facades\Session;
$count=Role::leftJoin('user_role','roles.id','user_role.id_role')->leftJoin('users','users.id','user_role.id_user')->where('users.id',Auth::user()->id)->where('roles.url',str_replace(URL::to('/'),'',Request::url()))->where('user_role.allow_add','1')->count();
@endphp
@if($count>0)
<a title="add new data" class="btn btn-sm btn-success" href="{{Request::url()}}/add"><i class="fa fa-plus-circle"></i>
    {{$btnname}}
</a>

@endif