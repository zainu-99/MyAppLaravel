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
                      <td>User ID</td>
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
              {{-- <tbody>
                    @foreach($list as $key=>$item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td nowrap>{{$item->userid}}</td>
                        <td nowrap>{{$item->name}}</td>
                        <td nowrap>{{$item->email}}</td>
                        <td nowrap>{{$item->no_hp}}</td>
                        <td nowrap>{{$item->address}}</td>
                        <td>{{$item->gender == '0'?'Female':'Male' }}</td>
                        <td nowrap>{{$item->created_at}}</td>
                        <td nowrap>{{$item->updated_at}}</td>
                        <td style="width: 237px" nowrap>
                            <a title="reset password to admin" class="btn btn-xs btn-warning text-light" onclick="resetPassword({{$item->id}});" ><i class="fas fa-key"></i></a>
                            <a title="set user access" class="btn btn-xs btn-info text-light" href="{{Request::url().'/useraccess/'.$item->id}}"><i class="fas fa-shield-alt"></i></a>
                            <a title="set user group" class="btn btn-xs btn-warning text-light" href="{{ Request::url().'/usergrouplevel/'.$item->id}}"><i class="fas fa-layer-group"></i></a>
                            @include('layouts.action.edit-button') 
                            @include('layouts.action.delete-button') 
                        </td>
                    </tr>
                    @endforeach
              </tbody> --}}
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
     $(document).ready(function() {
       var t = $('#serversidedatatable').DataTable( {
      "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
       "order": [[ 1, 'asc' ]],
       "processing": true,
       "serverSide": true,
       lengthMenu: [10, 15, 20, 50, 100, 200, 500],       
       "ajax": "{{URL::to('/')}}/api/appdashboard/adminsystem/user",
        columns: [
            { data: null, name: 'nomor' },
            { data: 'userid', name: 'userid' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'no_hp', name: 'no_hp' },
            { data: 'address', name: 'address' },
            { data: 'gender', name: 'gender' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { data: null,name:'action',"sWidth": "150px", "bSortable": false,"mRender": function (o) { 
              return '<a title="reset password to admin" class="btn btn-xs btn-warning text-light" onclick="resetPassword('+o.id+');" ><i class="fas fa-key"></i></a>'+
               ' <a title="set user access" class="btn btn-xs btn-info text-light" href="{{Request::url()}}/useraccess/'+ o.id +'"><i class="fas fa-shield-alt"></i></a>'+
               ' <a title="set user group" class="btn btn-xs btn-warning text-light" href="{{ Request::url()}}/usergrouplevel/'+ o.id +'"><i class="fas fa-layer-group"></i></a>'+
               ' <a title="edit data" class="btn btn-xs btn-primary" href="{{Request::url()}}/edit/'+ o.id +'"><i class="fa fa-edit"></i></a>'+
               ' <a title="delete data" class="btn btn-xs btn-danger text-light" onclick="alertDelete('+ o.id +');"> <i class="fa fa-trash"></i> </a>';
            }}
        ],
        "order": [[ 1, 'asc' ]],        
      });
      t.on('draw', function () {
        reinitdatatable()
      });

      function reinitdatatable(){
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            });
            $('#serversidedatatable tbody tr td').each(function(){
                $(this).attr('nowrap', 'nowrap');
            });
      }
     });
    </script>
@endsection
