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
              <li class="breadcrumb-item active">Custom CSS</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            @if (Session::has('error'))
            <div class="alert alert-danger">
                    <ul>
                            <li>{{ Session::get('error') }}</li>
                    </ul>
                </div>
            @endif
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
                <button id="create" class="btn btn-primary">Create CSS file</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  @foreach ($css as $row)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $row->title }}</td>
                      <td>{{ $row->status == 1 ? 'Open' : 'Off'}}</td>
                      <td><img src="{{ asset('edit.png') }}" onclick="edit({{ $row->id }})" alt="" width="30px" height="30px"> <img src="{{ asset('delete.webp') }}" onclick="delete_user({{ $row->id }})" alt="" width="30px" height="30px"></td></td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
    </div>
</div>
<form action="{{ url('/admin/settings?group=css') }}" method="post">
    @csrf
<div id="modale_area"></div>
</form>
<form action="{{ url('/admin/settings_update?group=css') }}" method="post">
    @csrf
<div id="modale_area_edit"></div>
</form>
@endsection
@section('js')
  <script>
       
        $('button[id="create"]').click(function(){
            $.get(base_url+'admin/settings_modal?group=css',function(data){
                //console.log(data);
                $('#modale_area_edit').html('');
                $('#modale_area').html(data.html);
                $('#CSS').modal('show');
            });
        });
        function edit(id){
          $.get(base_url+'admin/settings_modal?group=css&id='+id,function(data){
                //console.log(data);
                $('#modale_area').html('');
                $('#modale_area_edit').html(data.html);
                $('#CSS').modal('show');
          });
        }
        function delete_user(id){
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