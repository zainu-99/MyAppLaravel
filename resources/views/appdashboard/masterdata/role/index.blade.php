@extends('layouts.dashboard.template')

@section('content')
<div class="card-header">
    <br/>
    <h3 class="card-title">
        @include('layouts.action.add-button',["btnname" => "Add Role"])
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
                      <td>Controller</td>
                      <td>Url</td>
                      <td>View</td>
                      <td>Add</td>
                      <td>Edit</td>
                      <td>Delete</td>
                      <td>Print</td>
                      <td>Custom</td>
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
                        <td nowrap>{{$item->note}}</td>
                        <td nowrap>{{$item->controller}}</td>
                        <td nowrap>{{$item->url}}</td>
                        <td nowrap>{{$item->accessview == '0'?'':'✔' }}</td>
                        <td nowrap>{{$item->accessadd == '0'?'':'✔' }}</td>
                        <td nowrap>{{$item->accessedit== '0'?'':'✔' }}</td>
                        <td nowrap>{{$item->accessdelete == '0'?'':'✔' }}</td>
                        <td nowrap>{{$item->accessprint == '0'?'':'✔' }}</td>
                        <td nowrap>{{$item->accesscustom == '0'?'':'✔' }}</td>
                        <td nowrap>{{$item->created_at}}</td>
                        <td nowrap>{{$item->updated_at}}</td>
                        <td nowrap> 
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
