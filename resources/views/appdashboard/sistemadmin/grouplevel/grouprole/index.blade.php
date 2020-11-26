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
                                <input type="checkbox" @if($item->isjoin == 1) checked @endif onclick="checkedJoin({{$item->id}},$(this).val())">
                            </td>
                        </tr>
                        @endforeach
                  </tbody>
              </table>
            </div>
</div>
    <script>
      function checkedJoin(idrole,ischecked)
      {
        $.ajax({
                type:'POST',
                url:'{{ Request::url()}}/add',
                data:{ 
                  _token: '{{ csrf_token() }}', 
                  id_role:idrole,
                  is_checked: (ischecked==0?1:0),
                },
                success:function(data){      
                     //alert(data);
                }
            }); 
      }
    </script>
@endsection
