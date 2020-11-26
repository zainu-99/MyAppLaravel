@extends('layouts.dashboard.template')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <br/>
                <h3 class="card-title">
                  <i class="nav-icon far fas fa-blog"></i>
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
                                  <td>Controller</td>
                                  <td>Url</td>
                                  <td>Add</td>
                              </tr>
                          </thead>
                          <tbody>
                                @foreach($list as $key=>$item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td nowrap>{{$item->name}}</td>
                                    <td nowrap>{{$item->note}}</td>
                                    <td nowrap>{{$item->controller}}</td>
                                    <td nowrap>{{$item->url}}</td>
                                    <td style="width: 237px"> 
                                        <input type="checkbox" @if($item->isjoin == 1) checked @endif onclick="checkedJoin({{$item->id}},{{Request::get('id_group_level')}},$(this).is(':checked'));">
                                    </td>
                                </tr>
                                @endforeach
                          </tbody>
                      </table>
                    </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

    </div>
    <script>
      function checkedJoin(idrole,idgrouplevel,ischecked)
      {
        $.ajax({
                type:'POST',
                url:'{{ url('sysadmin/adminsys/role')}}/add',
                data:{ 
                  _token: '{{ csrf_token() }}', 
                  id_role:idrole,
                  id_group_level:idgrouplevel,
                  is_checked:+ischecked,
                },
                success:function(data){      
                     //alert("success");
                }
            }); 
      }
    </script>
@endsection
