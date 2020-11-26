@extends('layouts.dashboard.template')

@section('content')
<div class="card-header">EDIT DATA</div>

                <div class="card-body">
                        <form role="form" method="POST" action="">
                            {{ csrf_field() }} 
                            <div class="form-group">
                                <label>Role :</label>
                                <div class="">
                                <select class=""  name="id_role" style="width: 100%;height:39px">
                                @foreach($roles as $role)
                                    <option @if($item->id_role == $role->id) selected @endif value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group" style="display:">
                                <label>Menu Text :</label>
                                <input  class="form-control" name="menu_text" value="{{$item->menu_text}}" placeholder=""/>
                            </div>
                            <div class="form-group">
                                <label>Parent :</label>
                                <div class="">
                                <select class=""  name="id_parent" style="width: 100%;height:39px">
                                <option value="-">No Parent</option>
                                @foreach($parents as $parent)
                                    <option @if($item->id == $parent->id) hidden @endif @if($item->menu_app_id == $parent->id) selected @endif value="{{$parent->id}}">{{$parent->menu_text}}</option>
                                @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Icon :</label>
                                <input  class="form-control" name="icon" value="{{$item->icon}}" placeholder=""/>
                            </div>
                            <div class="form-group">
                                <label>Order Sort :</label>
                                <input type="number" min="0"  class="form-control" name="order_sort" value="{{$item->order_sort}}" placeholder=""/>
                            </div>
                            <div class="box-footer">
                                <input type="submit" name="submit" type="submit" class="btn btn-primary pull-right" value="SUBMIT"></input>
                            </div>
                        </form>
                </div>
</div>
@endsection
