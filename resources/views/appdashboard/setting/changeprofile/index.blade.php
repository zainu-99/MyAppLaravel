@extends('layouts.dashboard.template')

@section('content')
<div class="card-header"><strong>ADD DATA</strong></div>
@if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
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
                <label>Email :</label>
                <input required="" class="form-control" name="email" value="{{$item->email}}" placeholder=""/>
            </div>
            <div class="form-group" style="display:">
                <label>No HP :</label>
                <input required="" class="form-control" name="no_hp" value="{{$item->no_hp}}" placeholder=""/>
            </div>
            <div class="form-group" style="display:">
                <label>Address :</label>
                <input required="" class="form-control" name="address" value="{{$item->address}}" placeholder=""/>
            </div>
            <div class="form-group" style="display:">
                <label>Gender :</label>
                <div>
                <div class="checkbox">
                        <input id="cballshow" value="1" @if($item->gender == 1) checked @endif name="gender" type="radio">Male &nbsp;
                        <input id="cballshow" value="0"  @if($item->gender == 0) checked @endif name="gender" type="radio">Female
                </div>
                </div>
            </div>
            <div class="box-footer">
                <input name="submit" type="submit" class="btn btn-primary pull-right" value="SUBMIT"/>
            </div>
        </form>
</div>
@endsection
