@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection
@section('main_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Messenger Groups</li>
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
                <button id="create" class="btn btn-primary">Create Group</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Admin</th>
                        {{-- <th>Member</th> --}}
                        <th>Add/Remove</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>

               @foreach($groups as $group)
                    {{-- @php
                      $do = false;
                      $count = 1 ;
                      $member = $group->member == null || $group->member == '' ?
                                [] :
                                json_decode($group->member);

                      if($member){
                        foreach($member as $m) $count++;
                      }
                      if(in_array(Auth::id(),$member)) $do = true;
                      else $do = false;
                      if(is_super()) $do = false;

                    @endphp
                    @continue($do) --}}
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $group->id }}</td>
                      @php
                         $thread = \DB::table('participants')->where('thread_id', $group->id)->first();
                         $ownerName = @\DB::table('users')->where('id', $thread->owner_id)->first();
                      @endphp
                      <td>{{ @$ownerName->name }}</td>
                      {{-- <td>{{ $count }}</td> --}}
                      <td>
                        <button id="manege" data-id="{{ $group->id }}" class="btn btn-primary">Menege</button>
                      </td>
                      <td><img src="{{ asset('edit.png') }}" onclick="edit('{{ $group->id }}')" alt="" width="30px" height="30px"> <img src="{{ asset('delete.webp') }}" onclick="delete_group({{ $group->id }})" alt="" width="30px" height="30px"></td></td>
                    </tr>
                @endforeach
                  </tbody>
                </table>
              </div>
            </div>
    </div>
</div>
<form action="{{ url('/groupmakerstore') }}" method="post">
    @csrf
<div id="modale_manege"></div>
</form>
<form action="{{ url('/groupmakerstore') }}" method="post">
    @csrf
<div id="modale_area"></div>
</form>
<form action="{{ url('/groupmakerrestore') }}" method="post">
    @csrf
<div id="modale_area_edit"></div>
</form>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
  <script>
        $('button[id="manege"]').click(function(){
            $.get(base_url+'groupmanegemodal?manege=true&data='+$(this).data('id'),function(data){
                //console.log(data);
                $('#modale_area').html('');
                $('#modale_area_edit').html('');
                $('#modale_manege').html(data.html);
                $('#modal_show').modal('show');
                $('select[class="selectpicker"]').selectpicker();
            });
        });

        $('button[id="create"]').click(function(){
            $.get(base_url+'groupmakermodal',function(data){
                //console.log(data);
                $('#modale_manege').html('');
                $('#modale_area_edit').html('');
                $('#modale_area').html(data.html);
                $('#modal_show').modal('show');
                $('select[class="selectpicker"]').selectpicker();
            });
        });
        function edit(id){
          $.get(base_url+'groupmakermodal?id='+id,function(data){
                //console.log(data);
                $('#modale_manege').html('');
                $('#modale_area').html('');
                $('#modale_area_edit').html(data.html);
                $('#modal_show').modal('show');
                $('select[class="selectpicker"]').selectpicker();
          });
        }
        function delete_group(id){
          if(!confirm("Are You Sure To Want Delete")) return 0 ;
          $.post(base_url+'groupmakerdelete/'+id,{"_token":"{{ csrf_token() }}"},function(data){
            //console.log(data);
            if(data) window.location.reload();
          });
        }
        function getUser(val){
          $.post(base_url+'getuserformembers?data='+val.value,{"_token":"{{ csrf_token() }}"},function(data){
            console.log(data.members);
             var html = '' ;
             data.user.forEach(function(user){
                  var select = data.members.includes(String(user.id)) ? 'checked' : '' ;
                  html += `<label for="studentformfield">${user.name}</label>
                          <input type="checkbox" onchange="memberManege(${val.dataset.group},${user.id})" id="member" data-id="${user.id}" ${select} class="form-control">`;
             });
             $('div[id="bodyForMembers"]').html('');
             $('div[id="bodyForMembers"]').append(html);
          });
        }
        function memberManege(g,i){
           $.post(base_url+'membersmanege/'+g+'/'+i,{"_token":"{{ csrf_token() }}"},function(data){
              console.log(data);
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
