@extends('layouts.dashboard.template')

@section('content')
<div class="card-header">
    <br/>
    <h3 class="card-title">
        @include('layouts.action.add-button',["btnname" => "Add New Menu"])
    </h3>
    <br/>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
        <div style="overflow: auto;">
          <table id=""  class="table table-hover">
              <thead >
                  <tr class="text-light bg-dark"> 
                      <th>Menu Text</th>
                      <th>Role</th>
                      <th>URL</th>
                      <th>Icon</th>
                      <th>Sort</th>
                      <th >Created At</th>
                      <th>Updated At</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($menu as $key=>$childrenMenus)
                    @include('appdashboard.masterdata.menu.tr_table', ['item' => $childrenMenus,'sparator'=>''])       
                @endforeach
              </tbody>
          </table>
        </div>
</div>
@endsection
