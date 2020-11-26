@extends('layouts.dashboard.template')

@section('content')
<div class="card-header">ADD DATA</div>

<div class="card-body">
        <form role="form" method="POST" action="">
            {{ csrf_field() }} 
            <div class="form-group" style="display:">
                <label>Name :</label>
                <input type="text" required="" class="form-control" name="name" value="" placeholder=""/>
            </div>
            <div class="form-group" style="display:">
                <label>Note :</label>
                <input type="text" required="" class="form-control" name="note" value="" placeholder=""/>
            </div>                           
            <div class="box-footer">
                <input type="submit" name="submit" type="submit" class="btn btn-primary pull-right" value="SUBMIT"></input>
            </div>
        </form>
</div>
@endsection
