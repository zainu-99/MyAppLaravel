@extends('layouts.dashboard.template')

@section('content')
<div class="card-header">ADD DATA</div>
@if ($message = Session::get('error'))
      <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
      </div>
@endif
<div class="card-body">
        <form role="form" method="POST" action="">
            {{ csrf_field() }} 
            <div class="form-group" style="display:">
                <label>Name :</label>
                <input required="" class="form-control" name="name" value="{{$item->name}}" placeholder=""/>
            </div>
            <div class="form-group" style="display:">
                <label>Url :</label>
                <input type="text" class="form-control" name="url" value="{{$item->url}}" placeholder=""/>
            </div>  
            <div class="form-group" style="display:">
                <label>Controller :</label>
                <input type="text"  class="form-control" name="controller" value="{{$item->controller}}" placeholder=""/>
            </div>  
            <div class="form-group" style="display:">
                <label>Note :</label>
                <input  class="form-control" name="note" value="{{$item->note}}" placeholder=""/>
            </div>
            <div class="form-group" style="display:">
                <label>Access :</label>
                <div>
                <div class="checkbox">
                        <input name="accessview" @if($item->accessview==1)checked @endif type="checkbox"> Access View &nbsp;
                        <input name="accessadd" @if($item->accessadd==1)checked @endif type="checkbox"> Access Add &nbsp;
                        <input name="accessedit" @if($item->accessedit==1)checked @endif type="checkbox"> Access Edit &nbsp;
                        <input name="accessdelete" @if($item->accessdelete==1)checked @endif type="checkbox"> Access Delete &nbsp;
                        <input name="accessprint" @if($item->accessprint==1)checked @endif type="checkbox"> Access Print &nbsp;
                        <input name="accesscustom" @if($item->accesscustom==1)checked @endif type="checkbox"> Access Custom
                </div>
                </div>
            </div>     
            <div class="box-footer">
                <input type="submit" name="submit" type="submit" class="btn btn-primary pull-right" value="SUBMIT"></input>
            </div>
        </form>
</div>

@endsection
