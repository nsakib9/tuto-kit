@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('main_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Role Manege Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Role</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
            <div class="container-fluid">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                
            </div>
            <div class="card">
              <div class="card-header">
                <button id="create" class="btn btn-primary">Create Role</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Role Name</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  @foreach ($role as $row)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $row->name }}</td>
                      <td><img src="{{ asset('edit.png') }}" onclick="edit({{ $row->id }})" alt="" width="30px" height="30px"> <img src="{{ asset('delete.webp') }}" onclick="delete_role({{ $row->id }})" alt="" width="30px" height="30px"></td></td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <!-- <div class="card">
              <div class="card-header">
                <button id="create" class="btn btn-primary">Create Class</button>
              </div>
             
              <div class="card-body">
                  permission
              </div>
            </div> -->
    </div>
</div>
<div id="create_role">
<form action="{{ url('/admin/role_creator') }}" method="post">
   @csrf
   <div id="role_modal"></div>
</form>
</div>

<div id="edit_role">
<form action="{{ url('/admin/role_update') }}" method="post">
   @csrf
   <div id="edit_role_modal"></div>
</form>
</div>
 
@endsection
@section('js')
  <script>

        $('button[id="create"]').click(function(){
            $.get(base_url+'admin/role_create',function(data){
                //console.log(data);
                $('#edit_role_modal').html('');
                $('#role_modal').html(data.create);
                $('#role_modal_show').modal('show');
            });
        });
        function edit(id){
          $.get(base_url+'admin/role_create?edit=true&id='+id,function(data){
                //console.log(data);
                $('#role_modal').html('');
                $('#edit_role_modal').html(data.edit);
                $('#role_modal_show').modal('show');
          });
        }
        function delete_role(id){
          if(!confirm("Are You Sure To Want Delete Role")) return 0 ;
          $.post(base_url+'admin/role_delete/'+id,{"_token":"{{ csrf_token() }}"},function(data){
            console.log(data);
            if(data) window.location.reload();
          });
        }
    // Datatable
        $(function () {
        $("#example1").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        $("#example2").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
      });
  </script>
@endsection