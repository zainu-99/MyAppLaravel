@extends('layouts.dashboard.template')

@section('content')
<div class="card-header">
    <br/>
    <h3 class="card-title">
      @include('layouts.action.add-button',["btnname" => "Add Group Master"])
    </h3>
    <br/>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
        <div style="overflow: auto;">
          <table id="datatable"  class="table table-hover">
              <thead >
                  <tr> 
                      <td>No</td>
                      <td>Name</td>
                      <td>Note</td>
                      <td>Created At</td>
                      <td>Updated At</td>
                      <td>Action</td>
                  </tr>
              </thead>
              <tbody>
                    @foreach($list as $key=>$item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->note}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->updated_at}}</td>
                        <td style="width: 237px" nowrap> 
                            @include('layouts.action.edit-button') 
                            @include('layouts.action.delete-button') 
                        </td>
                    </tr>
                    @endforeach
              </tbody>
          </table>
        </div>
  </div>
@endsection
