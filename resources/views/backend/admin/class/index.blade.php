@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('main_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Class Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Class</li>
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
                <button id="create" class="btn btn-primary">Create Class</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Class Name</th>
                        <th>Class img</th>
                        <th>Total Subjects</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  @foreach ($class as $row)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $row->title }}</td>
                      <!-- <td><img src="{{ asset('images/'.$row->img) }}" alt=""  width="90px" height="70px"></td> -->
                      <td></td>
                      <td>{{ count($row->subject) }}</td>
                      <td>
                        {{ $row->status ? 'Open' : 'Off' ; }}
                      </td>
                      <td><img src="{{ asset('edit.png') }}" onclick="edit({{ $row->id }})" alt="" width="30px" height="30px"> <img src="{{ asset('delete.webp') }}" onclick="delete_dt({{ $row->id }})" alt="" width="30px" height="30px"></td></td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>

  
            
            <div class="card">
              <div class="card-header">
                <button id="create_subject" class="btn btn-primary">Create Subject</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Subject Name</th>
                        <th>Subject img</th>
                        <th>Class</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  @foreach ($subject as $row)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $row->title }}</td>
                      <td>
                        <!-- <img src="{{ asset('images/'.$row->img) }}" alt=""  width="90px" height="70px"> -->
                      </td>
                      <td>
                        {{ $row->course->title }}
                      </td>
                      <td>
                        {{ $row->status ? 'Open' : 'Off' ; }}
                      </td>
                      <td><img src="{{ asset('edit.png') }}" onclick="edit_sub({{ $row->id }})" alt="" width="30px" height="30px"> <img src="{{ asset('delete.webp') }}" onclick="delete_dt_sub({{ $row->id }})" alt="" width="30px" height="30px"></td></td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
    </div>
</div>

  <!-- Class -->
  <div>
    <div class="modal fade" id="create_class" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Class</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{ url('/admin/create_class') }}" method="post" enctype="multipart/form-data">
                    @csrf
          <div class="modal-body" id="body">
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div>
    <div class="modal fade" id="edit_class" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Class</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{ url('/admin/edit_class') }}" method="post" enctype="multipart/form-data">
                    @csrf
          <div class="modal-body" id="edit_body">
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Subject -->
  <div>
    <div class="modal fade" id="modal_subject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Subject</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{ url('/admin/create_subject') }}" method="post" enctype="multipart/form-data">
                    @csrf
          <div class="modal-body" id="body_subject">
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div>
    <div class="modal fade" id="edit_subject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Subject</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{ url('/admin/edit_subject') }}" method="post" enctype="multipart/form-data">
                    @csrf
          <div class="modal-body" id="edit_subject_body">
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('js')
  <script>
      // Class
      $('button[id="create"]').click(function(){
        $.get(base_url+'admin/create_class',function(data){
          $('#edit_subject_body').html('');
          $('#body_subject').html('');
          $('#edit_body').html('');
          $('#body').html(data.data);
          $('#create_class').modal('show');
        });
      });
      function edit(id){
        $.get(base_url+'admin/edit_class/'+id,function(data){
          $('#edit_subject_body').html('');
          $('#body_subject').html('');
          $('#body').html('');
          $('#edit_body').html(data.data);
          $('#edit_class').modal('show');
        });
      }
      function delete_dt(id){
        if(!confirm("Are You Sure To Want Delete Category")) return 0 ;
        $.post(base_url+'admin/delete_class/'+id,{"_token":"{{ csrf_token() }}"},function(data){
          console.log('Deleted Successfully');
          if(data) window.location.reload();
        });
      }
      // Subject
      $('button[id="create_subject"]').click(function(){
        $.get(base_url+'admin/create_subject/true',function(data){
          $('#edit_body').html('');
          $('#edit_subject_body').html('');
          $('#body_subject').html(data.data);
          $('#modal_subject').modal('show');
        });
      });
      function edit_sub(id){
        $.get(base_url+'admin/create_subject/true?edit=true&id='+id,function(data){
          $('#body').html('');
          $('#edit_body').html('');
          $('#body_subject').html('');
          $('#edit_subject_body').html(data.data);
          $('#edit_subject').modal('show');
        });
      }
      function delete_dt_sub(id){
        if(!confirm("Are You Sure To Want Delete This Subject")) return 0 ;
        $.post(base_url+'admin/delete_subject/'+id,{"_token":"{{ csrf_token() }}"},function(data){
          console.log('Deleted Successfully');
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