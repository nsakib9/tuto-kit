@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('main_content')
    <div class="content-wrapper">
          <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Inbox</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Search Mail">
                  <div class="input-group-append">
                    <div class="btn btn-primary">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-check-square"></i>
                </button>
                <div class="btn-group">
                  <button type="button" onclick="delete_array()" class="btn btn-default btn-sm">
                    <i class="far fa-trash-alt"></i>
                  </button>
                </div>
                <!-- /.btn-group -->
                <div class="float-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-left"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-right"></i>
                    </button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                    @foreach ($mail as $row)
                  <tr>
                    <td>
                      <div class="icheck-primary">
                        <input type="checkbox" value="{{ $row->id }}" id="check1" onchange="select_array(this.value)">
                        <label for="check1"></label>
                      </div>
                    </td>
                    <td class="mailbox-star"><a href="#"><i class="fas {{ $row->read_at ? 'fa-eye' : ''; }} "></i></a></td>
                    <td class="mailbox-name" onclick="read({{ $row->id }})"><a href="#">{{ $row->name }}</a></td>
                    <td class="mailbox-subject">{{$row->email.' - '}}<b>{{mb_strimwidth($row->massage,0,40,'...')}}</b>
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date">5 mins ago</td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            
          </div>
          <!-- /.card -->
    </div>  
    </div>  
    </div>  
<form action="{{ url('/admin/user_add?group=admin') }}" method="post">
    @csrf
<div id="modale_area"></div>
</form>
@endsection
@section('js')
  <script>   
        var contacts = [];
        var l = contacts.length;
        var i = 0;   
        function read(id){
            $.get(base_url+'admin/read_contact/'+id,function(data){
                //console.log(data);
                $('#modale_area').html('');
                $('#modale_area').html(data.html);
                $('#modal-xl').modal('show');
            });
        };

        function delete_id(id , allow = true){
          if(allow)
          if(!confirm("Are You Sure To Want Delete")) return 0 ;
          $.post(base_url+'admin/delete_contact/'+id,{"_token":"{{ csrf_token() }}"},function(data){
            if(data && allow) window.location.reload();
            if(l == i) window.location.reload();
          });
        }

        function select_array(id){
            var has = contacts.includes(id);
           if(has){
            contacts.splice(contacts.indexOf(id),1);
            console.log(contacts);
            return 0;
           }
           contacts.push(id);
        }
        function delete_array(){

          contacts.forEach(function(id){
            delete_id(id,false);
          });
          contacts = [];
        }
 
  </script>
@endsection