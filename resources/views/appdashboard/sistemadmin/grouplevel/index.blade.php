@extends('layouts.dashboard.template')

@section('content')
<div class="card-header">
    <br/>
    <h3 class="card-title text-info">
      LIST GROUP LEVEL 
    </h3>
    <br/>
  </div>
  <div class="card-header">
    <br/>
    <form role="form" id="form" method="POST" action="{{Request::url()}}/add">
          {{ csrf_field() }} 
            <input type="hidden" id="id"  class="form-control" name="id" value="" placeholder=""/>
            <div class="row">
              <div class="col-md-2">
                    <div class="form-group" style="display:">
                      Group
                      <select class="" id="id_group"  name="id_group" style="width: 100%;height:39px">
                        @foreach($groups as $group)
                            <option  @if( Request::get('id')==$group->id) selected @endif value="{{$group->id}}">{{$group->name}} - {{$group->note}}</option>
                        @endforeach
                      </select>
                    </div>
              </div>
              <div class="col-md-2">
                    <div class="form-group" style="display:">
                      Parent
                      <select class="" id="group_level_id"  name="group_level_id" style="width: 100%;height:39px">  
                        <option value="-1">No Parent</option>
                        @foreach($groupLevels as $groupLevel)
                            <option class="parent_option" id="parent_option_{{$groupLevel->id}}" value="{{$groupLevel->id}}">{{$groupLevel->name}} - {{$groupLevel->note}}</option>
                        @endforeach
                      </select>
                    </div>
              </div>
              <div class="col-md-3">
                    <div class="form-group" style="display:">
                      Keterangan
                      <input id="note" class="form-control" value="" name="note" placeholder=""/>
                    </div>
              </div>
              <div class="col-md-2">
                  <div class="form-group">
                    <label></label>
                      <input type="reset" id="reset" onclick="resetform()" name="reset" class="form-control btn btn-warning text-light" value="Reset"/>
                  </div>
            </div> 
              <div class="col-md-2">
                    <div class="form-group">
                      <label></label>
                        <input type="submit" id="submit" name="submit" class="form-control btn btn-primary" value="SAVE"/>
                    </div>
              </div>    
          </div>
    </form>
    <br/>
  </div>
  <div class="card-body">
        <div style="overflow: auto;">
          <table id=""  class="table table-hover">
              <thead >
                  <tr> 
                      <td>Group</td>
                      <td>Note</td>
                      <td>Created At</td>
                      <td>Updated At</td>
                      <td>Action</td>
                  </tr>
              </thead>
              <tbody>
                @foreach($list as $key=>$child_GroupsLevel)
                    @include('appdashboard.sistemadmin.grouplevel.tr_table', ['child_GroupsLevel' => $child_GroupsLevel,'sparator'=>''])       
                @endforeach
              </tbody>
          </table>
        </div>
  </div>
<script>
  function editRow(id,id_group,group_level_id,note) {
        $('#note').val(note);
        $('#group_level_id').val(group_level_id);
        $("#id_group").val(id_group);
        $("#id").val(id);
        $("#submit").val("UPDATE");
        $("#form").attr('action', '{{Request::url()}}/edit/'+group_level_id);
        $(".parent_option").show();
        $("#parent_option_" + id).hide();
    }

    function resetform()
    {
       $("#submit").val("SAVE");
    }
</script>
@endsection
