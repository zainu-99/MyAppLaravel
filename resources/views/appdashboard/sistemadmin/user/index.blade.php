@extends('layouts.dashboard.template')

@section('content')
<div class="card-header">
    <br/>
    <h3 class="card-title">
      @include('layouts.action.add-button',["btnname" => "Add User"])
    </h3>
    <br/>
</div>
<div class="card-body">
        <div style="overflow: auto;">
          <table id="serversidedatatable"  class="table table-hover">
              <thead >
                  <tr> 
                      <td>No</td>
                      <td>Name</td>
                      <td>Email</td>
                      <td>NoHp</td>
                      <td>Address</td>
                      <td>Gender</td>
                      <td>Created At</td>
                      <td>Updated At</td>
                      <td>Action</td>
                  </tr>
              </thead>
              <tbody>
                    @foreach($list as $key=>$item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td nowrap>{{$item->name}}</td>
                        <td nowrap>{{$item->email}}</td>
                        <td nowrap>{{$item->no_hp}}</td>
                        <td nowrap>{{$item->address}}</td>
                        <td>{{$item->gender == '0'?'Female':'Male' }}</td>
                        <td nowrap>{{$item->created_at}}</td>
                        <td nowrap>{{$item->updated_at}}</td>
                        <td style="width: 237px" nowrap>
                            <a class="btn btn-xs btn-warning text-light" onclick="resetPassword({{$item->id}});" ><i class="fas fa-key"></i></a>
                            <a class="btn btn-xs btn-info text-light" href="{{Request::url().'/useraccess/'.$item->id}}"><i class="fas fa-shield-alt"></i></a>
                            <a class="btn btn-xs btn-warning text-light" href="{{ Request::url().'/usergrouplevel/'.$item->id}}"><i class="fas fa-layer-group"></i></a>
                            @include('layouts.action.edit-button') 
                            @include('layouts.action.delete-button') 
                        </td>
                    </tr>
                    @endforeach
              </tbody>
          </table>
        </div>
</div>
    <script>
      function resetPassword(iduser) 
      {
          
        var r = confirm("Are You Sure Want To Reset password?");
        if (r == true) {
            $.ajax({
                type:'POST',
                url:'{{Request::url()}}/edit/' + iduser,
                data:{ 
                _token: '{{ csrf_token() }}', 
                id_user:iduser,
                reset_pass:'reset_pass',
                },
                success:function(data){      
                    alert(data);
                }
            }); 
        }
     }
    </script>
@endsection
