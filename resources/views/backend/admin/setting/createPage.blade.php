@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('main_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Custom CSS Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Setting</li>
              <li class="breadcrumb-item active">Custom Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

        </div>
        <div class="card">
              <div class="card-header">
                <button id="create" class="btn btn-primary">Create Page</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                    
              </div>
            </div>
    </div>
</div>

@endsection
@section('js')
  <script>
        function delete_whatEver(id){
          if(!confirm("Are You Sure To Want Delete")) return 0 ;
          $.post(base_url+'admin/settings_delete/'+id,{"_token":"{{ csrf_token() }}"},function(data){
            //console.log(data);
            if(data) window.location.reload();
          });
        }
        // Datatable
        $(function () {
            $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
  </script>
@endsection