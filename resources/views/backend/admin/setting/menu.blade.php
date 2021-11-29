@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('main_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Menu Builder</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Setting</li>
              <li class="breadcrumb-item active">Menu Builder</li>
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
                <button id="create" class="btn btn-primary">Create Menu</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Title</th>
                        <th>URL</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  @foreach ($menu as $row)
                    @if($row->is_sub == 1)
                     @continue
                    @endif
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $row->title }}</td>
                      <td>{{ $row->url }}</td>
                      <td>{{ $row->status == 1 ? 'Open' : 'Off'}}</td>
                      <td><img src="{{ asset('edit.png') }}" onclick="edit({{ $row->id }})" alt="" width="30px" height="30px"> <img src="{{ asset('delete.webp') }}" onclick="delete_user({{ $row->id }})" alt="" width="30px" height="30px"></td></td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <div class="card-header">
                <button id="createsub" class="btn btn-primary">Create Child Menu</button>
                <br>
                <select name="" class="form-control" id="childmenu">
                  <option value="">Select Main Menu</option>
                  @foreach ($menu as $row)
                    @if($row->dropdown == 1)
                      <option value="{{$row->id}}">{{$row->title}}</option>
                    @endif
                  @endforeach
                </select>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Title</th>
                        <th>URL</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody id="subMenuItem">
  
                  </tbody>
                </table>
              </div>
            </div>
    </div>
</div>
<form action="{{ url('/admin/settings?group=menu') }}" method="post">
    @csrf
<div id="modale_area"></div>
</form>
<form action="{{ url('/admin/settings_update?group=menu') }}" method="post">
    @csrf
<div id="modale_area_edit"></div>
</form>
@endsection
@section('js')
  <script>
        $('button[id="create"]').click(function(){
            $.get(base_url+'admin/settings_modal?group=menu',function(data){
                //console.log(data);
                $('#modale_area_edit').html('');
                $('#modale_area').html(data.html);
                $('#MenuBar').modal('show');
            });
        });
        $('button[id="createsub"]').click(function(){
            $.get(base_url+'admin/settings_modal?group=menu&sub=true',function(data){
                //console.log(data);
                $('#modale_area_edit').html('');
                $('#modale_area').html(data.html);
                $('#MenuBar').modal('show');
            });
        });
        function edit(id){
          $.get(base_url+'admin/settings_modal?group=menu&id='+id,function(data){
                //console.log(data);
                $('#modale_area').html('');
                $('#modale_area_edit').html(data.html);
                $('#MenuBar').modal('show');
          });
        }
        function edit_sub(id){
          $.get(base_url+'admin/settings_modal?group=menu&sub=true&id='+id,function(data){
                //console.log(data);
                $('#modale_area').html('');
                $('#modale_area_edit').html(data.html);
                $('#MenuBar').modal('show');
          });
        }
        function delete_user(id){
          if(!confirm("Are You Sure To Want Delete")) return 0 ;
          $.post(base_url+'admin/settings_delete/'+id+'?group=menu',{"_token":"{{ csrf_token() }}"},function(data){
            //console.log(data);
            if(data) window.location.reload();
          });
        }


/////    Child Menu table and Select Box
        $('select[id="childmenu"]').change(function(){
          $.get(base_url+'admin/sub_menu/'+$(this).val(),function(data){
            console.log(data);
            $('#subMenuItem').html('');
            var rool = 1;
            data.forEach(function(i){
              var status = i.status == 1 ? 'Open' : 'Off';
              var item = '<tr>'+
                        '<td>'+rool+'</td>'+
                        '<td>'+i.title+'</td>'+
                        '<td>'+i.url+'</td>'+
                        '<td>'+status+'</td>'+
                        '<td><img src="'+"{{ asset('edit.png') }}"+'" onclick="edit_sub('+i.id+')" alt="" width="30px" height="30px"> <img src="'+"{{ asset('delete.webp') }}"+'" onclick="delete_user('+i.id+')" alt="" width="30px" height="30px"></td></td>'+
                        '</tr>';
              $('#subMenuItem').append(item);
              rool++;
              console.log(item);
            });
            $('#subMenuItem').append();
          },"json");
        });


        // Datatable
        $(function () {
            $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
  </script>
@endsection