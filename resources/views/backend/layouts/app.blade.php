<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('backend/backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('backend/backend/plugins/summernote/summernote-bs4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('backend/backend/dist/css/adminlte.min.css')}}">
 <!-- DataTables -->
 <link rel="stylesheet" href="{{ asset('backend/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('backend/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('backend/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
   <!-- CodeMirror -->
  <link rel="stylesheet" href="{{ asset('backend/backend/plugins/codemirror/codemirror.css')}}">
  <link rel="stylesheet" href="{{ asset('backend/backend/plugins/codemirror/theme/monokai.css')}}">
@yield('css')

  <!-- CodeMirror -->
<script src="{{ asset('backend/backend/plugins/codemirror/codemirror.js')}}"></script>
<script src="{{ asset('backend/backend/plugins/codemirror/mode/css/css.js')}}"></script>
<script src="{{ asset('backend/backend/plugins/codemirror/mode/xml/xml.js')}}"></script>
<script src="{{ asset('backend/backend/plugins/codemirror/mode/htmlmixed/htmlmixed.js')}}"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('backend.partials.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('backend.partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  @yield('main_content')

  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  @include('backend.partials.control')
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('backend.partials.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('backend/backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('backend/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src=""></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/backend/dist/js/adminlte.min.js')}}"></script>
<script>
  var base_url = "{{ '/' }}";
  var csrf = '{{ csrf_token() }}';
  var ImageArrayList = [];
</script>
<!-- Summernote --> 
<script src="{{ asset('backend/backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
<link rel="stylesheet" href="{{ asset('backend/backend/plugins/codemirror/codemirror.css')}}">
<link rel="stylesheet" href="{{ asset('backend/backend/plugins/codemirror/theme/monokai.css')}}">
<!-- Code Mirror -->
<script src="{{ asset('backend/backend/plugins/codemirror/codemirror.js')}}"></script>
<script src="{{ asset('backend/backend/plugins/codemirror/mode/css/css.js')}}"></script>
<script src="{{ asset('backend/backend/plugins/codemirror/mode/xml/xml.js')}}"></script>
<script src="{{ asset('backend/backend/plugins/codemirror/mode/htmlmixed/htmlmixed.js')}}"></script>
<!-- DataTables & Plugins -->
<script src="{{ asset('backend/backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('backend/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('backend/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('backend/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('backend/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('backend/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>

 <!-- //// -->
<script src="{{ asset('backend/backend/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('backend/backend/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('backend/backend/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('backend/backend/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('backend/backend/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('backend/backend/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
  @yield('js')

</body>
</html>
