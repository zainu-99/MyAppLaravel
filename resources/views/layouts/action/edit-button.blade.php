@if(Session::get('access')->allow_edit == 1)
<a title="edit data" class="btn btn-xs btn-primary" href="{{Request::url()}}/edit/{{$item->id}}"><i class="fa fa-edit"></i></a>
@endif