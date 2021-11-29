@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('main_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Category Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
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
                <button id="create" class="btn btn-primary">Create Category</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div style="overflow-x: scroll">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>S/N</th>
                          <th>Category Name</th>
                          <th>Image</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $row)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->title }}</td>
                        <td><img src="{{ asset('images/'.$row->img) }}" alt=""  width="90px" height="70px"></td>
                        <td><img src="{{ asset('edit.png') }}" onclick="edit({{ $row->id }})" alt="" width="30px" height="30px"> <img src="{{ asset('delete.webp') }}" onclick="delete_dt({{ $row->id }})" alt="" width="30px" height="30px"></td></td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>

              </div>
              <!-- /.card-body -->
            </div>
      </div>
    </div>
  </div>

  <div>
    <div class="modal fade" id="create_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{ url('/admin/create_category') }}" method="post" enctype="multipart/form-data">
                    @csrf
          <div class="modal-body" id="body">
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div>
    <div class="modal fade" id="edit_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{ url('/admin/edit_category') }}" method="post" enctype="multipart/form-data">
                    @csrf
          <div class="modal-body" id="edit_body">
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
@endsection
@section('js')
  <script>
      $('button[id="create"]').click(function(){
        $.get(base_url+'admin/create_category',function(data){
          $('#body').html(data.data);
          $('#create_category').modal('show');
            //console.log(data);
        });
      });
      function edit(id){
        $.get(base_url+'admin/edit_category/'+id,function(data){
          $('#edit_body').html(data.data);
          $('#edit_category').modal('show');
        });
      }
      function delete_dt(id){
        if(!confirm("Are You Sure To Want Delete Category")) return 0 ;
        $.post(base_url+'admin/delete_category/'+id,{"_token":"{{ csrf_token() }}"},function(data){
          console.log('Deleted Successfully');
          if(data) window.location.reload();
        });
      }
  </script>
@endsection