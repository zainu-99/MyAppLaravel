@extends('layouts.dashboard.template')

@section('content')
@php
    if(strpos(URL::to('/'), 'public') !== false)
        $public="";
    else  
        $public="public/";
@endphp
<div class="card-header"><strong>ADD DATA</strong></div>
<div class="card-body">
        <form role="form" method="POST" action="">
            {{ csrf_field() }} 
            <div class="form-group" style="display:">
                <label>User ID :</label>
                <input type="text" required="" class="form-control" name="userid" value="{{$item->userid}}" placeholder=""/>
            </div>
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
            <div class="form-group" style="display:">      
                <label for="feature_image">Photo</label>
                <input type="text" id="feature_image" readonly name="photo" value="{{$item->avatar}}">
                <a href="" class="popup_selector" data-url="{{ asset($public.'') }}/elfinder/popup/" data-inputid="feature_image">Select Image</a>
            </div>
            <div class="box-footer">
                <input type="submit" name="submit" type="submit" class="btn btn-primary pull-right" value="SUBMIT"></input>
            </div>
        </form>
</div>
@endsection
