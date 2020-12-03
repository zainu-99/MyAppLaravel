@if(Session::get('access')->allow_add == 1)
<a title="add new data" class="btn btn-sm btn-success" href="{{Request::url()}}/add"><i class="fa fa-plus-circle"></i>
    {{$btnname}}
</a>
@endif