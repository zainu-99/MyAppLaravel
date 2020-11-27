<!DOCTYPE html>
@php
    $public="";  
@endphp
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Dashboar Admin</title>
  <link rel="stylesheet" href="{{ asset($public.'AdminLTE') }}/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="{{ asset($public.'AdminLTE') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset($public.'AdminLTE') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset($public.'AdminLTE') }}/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini" style="visibility: hidden">
<div class="wrapper" >
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" id="togglemenu" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>  
    </ul>
    <form class="form-inline ml-3" style="visibility: hidden">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    <ul class="navbar-nav ml-auto" style="visibility: hidden">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">  
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right"> 
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link" style="text-align: center;">
      <span class="brand-text font-weight-light" style="font-weight: bold!important">App Core System</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset($public.'AdminLTE') }}/dist/img/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <p  class="text-light" title="{{ Auth::user()->email }}: {{ Auth::user()->name }}"><strong>ID :</strong> {{ Auth::user()->userid }}<br/><strong>Name :</strong> {{ Auth::user()->name }}</p>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">          
          @include('layouts.dashboard.navmenu')   
          <li class="nav-item">
            <a href="#" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout           
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>                     
          </li>
        </ul>
      </nav>
    </div>
  </aside>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
            <h4 class="m-0 text-dark"><strong>{{Session::get('pagename')}}</strong></h4>
      </div>
    </div>
    <div class="content">
      <div class="container-fluid">   
          <div class="card">
              <div class="card-body">
                  @yield('content')
              </div>
          </div>
      </div>
    </div>
  </div>
  <aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
      <h5>Sidebar</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <footer class="main-footer">
   Copyright &copy; 2019 | <strong>Framework by Deretcode.com</strong>
  </footer>
</div>
<script src="{{ asset($public.'AdminLTE') }}/plugins/jquery/jquery.min.js"></script>
<script src="{{ asset($public.'AdminLTE') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset($public.'AdminLTE') }}/dist/js/adminlte.min.js"></script>

<script src="{{ asset($public.'AdminLTE') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset($public.'AdminLTE') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset($public.'AdminLTE') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset($public.'AdminLTE') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
    $("input[type='checkbox']").each(function(e){$(this).on('change', function(){this.value = this.checked ? 1 : 0;}).change();});
    $(".item-menu").each(function( index ) {if((window.location.href).includes($( this ).attr('href')))$( this ).addClass("active" );});
    $(".has-treeview").each(function( index ) {if($(this).find('a.active').length !== 0)$( this ).addClass( "menu-open" ); else $( this ).removeClass( "menu-close" );});
    $(document).ready(function() {
    if (typeof(Storage) !== "undefined")
    {
      if(localStorage.getItem("toggle-colapes")=== null)
        localStorage.setItem("toggle-colapes", false);
      if(localStorage.getItem("toggle-colapes") === 'true')
        $('body').addClass("sidebar-collapse");
      else
        $('body').removeClass("sidebar-collapse");
    }
    $('#togglemenu').on('click', function() {
         $(this).trigger('classChange')
    });
    $('#togglemenu').on('classChange', function() {
        var isColllapse = !(localStorage.getItem("toggle-colapes") === 'true'); 
        localStorage.setItem("toggle-colapes", isColllapse);
    });
    $('#serversidedatatable').DataTable( {
       // "processing": true,
       // "serverSide": true,
      //  "ajax": "../server_side/scripts/server_processing.php"
    } );




    $("body").attr("style","visibility: visible");
} );
</script>
</body>
</html>
