@extends('layouts.dashboard.template')

@section('content')
<div class="card-header">
        <br/>
        <h3 class="card-title">
          LIST USER
        </h3><br/><hr/>
        <form action="" method="get">
            <div class="form-group">
              Group Level :  
            <select class="" id="id_group_level"  name="id_group_level" style="height:36px">
              @foreach($groupLevels as $groupLevel)
                  <option @if(Request::get('id_group_level')== $groupLevel->id) selected @endif value="{{$groupLevel->id}}">{{$groupLevel->name}} - {{$groupLevel->note}}</option>
              @endforeach
            </select>
            
                <input type="submit" name="submit" type="submit" class="btn-sm btn-primary" value="FILTER"/>
            </div>
        </form>
        <br/>
      </div>
      <div class="card-body">
            <div style="overflow: auto;">
              <table id=""  class="table table-hover">
                  <thead >
                      <tr> 
                          <td>No</td>
                          <td>Role</td>
                          <td>View</td>
                          <td>Add</td>
                          <td>Edit</td>
                          <td>Delete</td>
                          <td>Print</td>
                          <td>Custom</td>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($list as $key=>$item)
                    <tr> 
                      <td>{{$key+1}}</td>
                      <td>{{$item->name}}</td>
                      <td>@if($item->isview == 1)
                        <input id="cbview{{$key+1}}" type="checkbox" @if($item->allow_view == 1) checked @endif onclick="checkedis({{$item->id}},{{$key+1}})"/>@endif
                      </td>
                      <td>@if($item->isadd == 1)
                          <input id="cbadd{{$key+1}}" type="checkbox" @if($item->allow_add == 1) checked @endif onclick="checkedis({{$item->id}},{{$key+1}})"/>@endif</td>
                      <td>@if($item->isedit == 1)
                        <input id="cbedit{{$key+1}}" type="checkbox" @if($item->allow_edit == 1) checked @endif onclick="checkedis({{$item->id}},{{$key+1}})"/>@endif</td>
                      <td>@if($item->isdelete == 1)
                        <input id="cbdelete{{$key+1}}" type="checkbox" @if($item->allow_delete == 1) checked @endif onclick="checkedis({{$item->id}},{{$key+1}})"/>@endif</td>
                      <td>@if($item->isprint == 1)
                        <input id="cbprint{{$key+1}}" type="checkbox" @if($item->allow_print == 1) checked @endif onclick="checkedis({{$item->id}},{{$key+1}})"/>@endif</td>
                      <td>@if($item->iscustom == 1)
                        <input id="cbcustom{{$key+1}}" type="checkbox" @if($item->allow_orther == 1) checked @endif onclick="checkedis({{$item->id}},{{$key+1}})"/>@endif</td>
                  </tr>
                    @endforeach
                  </tbody>
              </table>
            </div>
      </div>
<script>
  function checkedis(idrole,key)
  {
    $.ajax({
            type:'POST',
            url:'{{ Request::url()}}/add',
            data:{ 
              _token: '{{ csrf_token() }}',
              id_role:idrole,
              allow_view:+$('#cbview'+key).is(':checked'),
              allow_add:+$('#cbadd'+key).is(':checked'),
              allow_edit:+$('#cbedit'+key).is(':checked'),
              allow_delete:+$('#cbdelete'+key).is(':checked'),
              allow_print:+$('#cbprint'+key).is(':checked'),
              allow_custom:+$('#cbcustom'+key).is(':checked'),
            },
            success:function(data){      
               // alert(data);
            }
        }); 
  }
</script>
@endsection
