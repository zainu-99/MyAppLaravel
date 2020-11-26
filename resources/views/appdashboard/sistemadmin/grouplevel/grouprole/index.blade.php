@extends('layouts.dashboard.template')

@section('content')
<div class="card-header">
        <br/>
        <h3 class="card-title">
          LIST ROLE GROUP LEVEL 
        </h3>
        <br/>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
            <div style="overflow: auto;">
              <table id=""  class="table table-hover">
                  <thead >
                      <tr> 
                          <td>No</td>
                          <td>Name</td>
                          <td>Note</td>
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
                            <td nowrap>{{$item->name}}</td>
                            <td nowrap>{{$item->note}}</td>
                            <td>@if($item->accessview == 1)
                              <input id="cbview{{$key+1}}" type="checkbox" @if($item->isview == 1) checked @endif onclick="checkedAccess({{$item->id}},{{$key+1}})"/>@endif
                            </td>
                            <td>@if($item->accessadd == 1)
                                <input id="cbadd{{$key+1}}" type="checkbox" @if($item->isadd == 1) checked @endif onclick="checkedAccess({{$item->id}},{{$key+1}})"/>@endif</td>
                            <td>@if($item->accessedit == 1)
                              <input id="cbedit{{$key+1}}" type="checkbox" @if($item->isedit == 1) checked @endif onclick="checkedAccess({{$item->id}},{{$key+1}})"/>@endif</td>
                            <td>@if($item->accessdelete == 1)
                              <input id="cbdelete{{$key+1}}" type="checkbox" @if($item->isdelete == 1) checked @endif onclick="checkedAccess({{$item->id}},{{$key+1}})"/>@endif</td>
                            <td>@if($item->accessprint == 1)
                              <input id="cbprint{{$key+1}}" type="checkbox" @if($item->isprint == 1) checked @endif onclick="checkedAccess({{$item->id}},{{$key+1}})"/>@endif</td>
                            <td>@if($item->accesscustom == 1)
                              <input id="cbcustom{{$key+1}}" type="checkbox" @if($item->isorther == 1) checked @endif onclick="checkedAccess({{$item->id}},{{$key+1}})"/>@endif</td>
                        </tr>
                        @endforeach
                  </tbody>
              </table>
            </div>
</div>
<script>
  function checkedAccess(idrole,key)
  {
    $.ajax({
            type:'POST',
            url:'{{ Request::url()}}/add',
            data:{ 
              _token: '{{ csrf_token() }}',
              id_role:idrole,
              isview:+$('#cbview'+key).is(':checked'),
              isadd:+$('#cbadd'+key).is(':checked'),
              isedit:+$('#cbedit'+key).is(':checked'),
              isdelete:+$('#cbdelete'+key).is(':checked'),
              isprint:+$('#cbprint'+key).is(':checked'),
              iscustom:+$('#cbcustom'+key).is(':checked'),
            },
            success:function(data){      
               //alert(data);
            }
        }); 
  }
</script>
@endsection
