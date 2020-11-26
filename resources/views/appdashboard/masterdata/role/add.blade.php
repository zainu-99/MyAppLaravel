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
                <input type="text" required="" class="form-control" name="name" value="" placeholder=""/>
            </div>
            <div class="form-group" style="display:">
                <label>Url :</label>
                <input type="text"  class="form-control" name="url" value="" placeholder=""/>
            </div>  
            <div class="form-group" style="display:">
                <label>Controller :</label>
                <input type="text"  class="form-control" name="controller" value="" placeholder=""/>
            </div>  
            <div class="form-group" style="display:">
                <label>Note :</label>
                <input type="text" class="form-control" name="note" value="" placeholder=""/>
            </div>  
            <div class="form-group" style="display:">
                <label>Access :</label>
                <div>
                <div class="checkbox">
                        <input name="accessview" checked type="checkbox"> Access View &nbsp;
                        <input name="accessadd" type="checkbox"> Access Add &nbsp;
                        <input name="accessedit" type="checkbox"> Access Edit &nbsp;
                        <input name="accessdelete" type="checkbox"> Access Delete &nbsp;
                        <input name="accessprint" type="checkbox"> Access Print &nbsp;
                        <input name="accesscustom" type="checkbox"> Access Custom
                </div>
                </div>
            </div>                         
            <div class="box-footer">
                <input type="submit" name="submit" type="submit" class="btn btn-primary pull-right" value="SUBMIT"></input>
            </div>
        </form>
</div>

<script>
    $('[type=checkbox]').on('load', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
</script>
@endsection
