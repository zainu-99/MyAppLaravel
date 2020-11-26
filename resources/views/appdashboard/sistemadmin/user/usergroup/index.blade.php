@extends('layouts.dashboard.template')

@section('content')
<div class="card-header">
        <h3 class="card-title">
          LIST USER GROUP LEVEL 
        </h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
            <div style="overflow: auto;">
              <table id=""  class="table table-hover">
                  <thead >
                      <tr> 
                          <td>Group</td>
                          <td>Note</td>
                          <td>Join</td>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($list as $key=>$child_GroupsLevel)
                        @include('appdashboard.sistemadmin.user.usergroup.tr_table', ['child_GroupsLevel' => $child_GroupsLevel,'sparator'=>''])       
                    @endforeach
                  </tbody>
              </table>
            </div>
      </div>
      <script>
            function checkedJoin(idgrouplevel,ischecked)
            {
              $.ajax({
                      type:'POST',
                      url:'{{Request::url()}}/add',
                      data:{ 
                        _token: '{{ csrf_token() }}', 
                        is_checked:(ischecked==0?1:0),
                        id_group_level:idgrouplevel,
                      },
                      success:function(data){      
                           //alert(data);
                      }
                  }); 
            }
          </script>
@endsection
