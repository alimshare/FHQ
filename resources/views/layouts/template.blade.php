<!--
 * CoreUI - Open Source Bootstrap Admin Template
 * @version v1.0.6
 * @link http://coreui.io
 * Copyright (c) 2017 creativeLabs Łukasz Holeczek
 * @license MIT
 -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
  <meta name="author" content="Łukasz Holeczek">
  <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,AngularJS,Angular,Angular2,Angular 2,Angular4,Angular 4,jQuery,CSS,HTML,RWD,Dashboard,React,React.js,Vue,Vue.js">

  <link rel="shortcut icon" href="{{ url('/') }}/dist/dist/img/favicon.png">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>

  <!-- Icons -->
  <link href="{{ url('/') }}/dist/vendors/css/font-awesome.min.css" rel="stylesheet">
  <link href="{{ url('/') }}/dist/vendors/css/simple-line-icons.min.css" rel="stylesheet">

  <!-- Main styles for this application -->
  <link href="{{ url('/') }}/dist/css/style.css" rel="stylesheet">
  <!-- Styles required by this views -->

  <link rel="stylesheet" href="{{ url('/') }}/dist/vendors/datatables/css/dataTables.bootstrap.min.css"/>
  <style type="text/css">
    .table-bordered thead th, .table-bordered thead td {
      border-bottom-width: 1px; 
    }
    select.form-control.input-sm.pull-right {
      margin: 0 5px;
    }
  </style>

    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ url('/') }}/dist/vendors/iCheck/all.css">

</head>

<!-- BODY options, add following classes to body to change options

// Header options
1. '.header-fixed'					- Fixed Header

// Brand options
1. '.brand-minimized'       - Minimized brand (Only symbol)

// Sidebar options
1. '.sidebar-fixed'					- Fixed Sidebar
2. '.sidebar-hidden'				- Hidden Sidebar
3. '.sidebar-off-canvas'		- Off Canvas Sidebar
4. '.sidebar-minimized'			- Minimized Sidebar (Only icons)
5. '.sidebar-compact'			  - Compact Sidebar

// Aside options
1. '.aside-menu-fixed'			- Fixed Aside Menu
2. '.aside-menu-hidden'			- Hidden Aside Menu
3. '.aside-menu-off-canvas'	- Off Canvas Aside Menu

// Breadcrumb options
1. '.breadcrumb-fixed'			- Fixed Breadcrumb

// Footer options
1. '.footer-fixed'					- Fixed footer

-->

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
  @include('layouts.component.header')

  <div class="app-body">
    
    @include('layouts.component.sidebar')

    <!-- Main content -->
    <main class="main">
        @yield('content')
    </main>

    @include('layouts.component.asidebar')

  </div>

  <footer class="app-footer">
  <span><a href="http://coreui.io">Abdullah 'Alim</a> © 2017 alimshare.</span>
    <span class="ml-auto">Powered by <a href="http://coreui.io">CoreUI</a></span>
    <!-- <span><a href="http://coreui.io">CoreUI</a> © 2017 creativeLabs.</span>
    <span class="ml-auto">Powered by <a href="http://coreui.io">CoreUI</a></span> -->
  </footer>

  <!-- Bootstrap and necessary plugins -->
  <script src="{{ url('/') }}/dist/vendors/js/jquery.min.js"></script>
  <script src="{{ url('/') }}/dist/vendors/js/popper.min.js"></script>
  <script src="{{ url('/') }}/dist/vendors/js/bootstrap.min.js"></script>
  <script src="{{ url('/') }}/dist/vendors/js/pace.min.js"></script>

  <!-- Plugins and scripts required by all views -->
  <script src="{{ url('/') }}/dist/vendors/js/Chart.min.js"></script>

  <!-- CoreUI main scripts -->

  <script src="{{ url('/') }}/dist/js/app.js"></script>

  <!-- Plugins and scripts required by this views -->

  <!-- Custom scripts required by this view -->
  <script src="{{ url('/') }}/dist/js/views/main.js"></script>

  <script src="{{ url('/') }}/dist/vendors/dataTables/js/jquery.dataTables.min.js"></script>
  <script src="{{ url('/') }}/dist/vendors/dataTables/js/DataTablesBS4.js"></script>

  <!-- iCheck 1.0.1 -->
  <script src="{{ url('/') }}/dist/vendors/iCheck/icheck.min.js"></script>

  <script type="text/javascript">
      $(document).ready(function(){
          $('.datatable').DataTable();

          //Flat red color scheme for iCheck
          $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue',
              increaseArea: '20%' // optional
          });
      });
  </script>

  @yield('footer-script', '')

</body>
</html>