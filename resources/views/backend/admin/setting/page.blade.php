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
              @if(!request()->input('form') && !request()->input('id'))
                <button id="create" class="btn btn-primary"><a style="color:white;" href="{{ url('/admin/settings?group=page&form=true') }}">Create Page</a></button>
              @else
              <button id="create" class="btn btn-primary"><a style="color:white;" href="{{ url('/admin/settings?group=page') }}">All Page</a></button>
              @endif
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              @if(!request()->input('form') && !request()->input('id'))
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
                  @foreach ($page as $row)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $row->title }}</td>
                      <td>{{ $row->url }}</td>
                      <td>{{ $row->status == 1 ? 'Open' : 'Off'}}</td>
                      <td><a href="{{url('admin/settings?group=page&id='.$row->id)}}"><img src="{{ asset('edit.png') }}" alt="" width="30px" height="30px"></a> <img src="{{ asset('delete.webp') }}" onclick="delete_page({{ $row->id }})" alt="" width="30px" height="30px"></td></td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              @else
              <form action="">
                <div class="form-group">
                    <label for="">Page Taitle</label>
                    <input type="text" name="title" value="<?php echo isset($page->title) ? $page->title : '' ; ?>" class="form-control"">
                </div>
                <div class="form-group">
                    <label for="">Page Body</label>
                    <textarea id="summernote" ><?php echo isset($page->content) ? $page->content : '' ; ?></textarea>
                </div>
                <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                        <input type="checkbox" name="header" class="custom-control-input" id="customSwitch2" <?php echo isset($page->header) && $page->header == '1' ? 'checked' : '' ; ?>>
                        <label class="custom-control-label" for="customSwitch2">Header</label>
                        </div>
                </div>
                <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                        <input type="checkbox" name="footer" class="custom-control-input" id="customSwitch3" <?php echo isset($page->footer) && $page->footer == '1' ? 'checked' : '' ; ?>>
                        <label class="custom-control-label" for="customSwitch3">Footer</label>
                        </div>
                </div>
                <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                        <input type="checkbox" name="status" class="custom-control-input" id="customSwitch4" <?php echo isset($page->status) && $page->status == '1' ? 'checked' : '' ; ?>>
                        <label class="custom-control-label" for="customSwitch4">Status</label>
                        </div>
                </div>
                @if(!request()->input('id'))
                <input type="button" value="Create Page" onclick="save_post_data()" class="btn btn-primary">
                @else
                <input type="hidden" name="id" value="<?php echo isset($page->id) ? $page->id : '' ; ?>">

                <input type="button" value="Update Page" onclick="save_post_data()" class="btn btn-primary">
                @endif
                </form>
              @endif
              </div>
            </div>
    </div>
</div>

@endsection
@section('js')
<script src="{{ asset('backend/backend/plugins/customJs_Summernote.js')}}"></script>
  <script>
        function delete_page(id){
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

  
  <script>
    ///// SUMMERNOTE 

    var imgPermission = false ;

 function UploadImage(formData){
    $.ajax({
      url : base_url+'admin/upload_image_to_temp',
      type: "POST",
      headers: {'X-CSRF-TOKEN': csrf},
      data : formData,
      processData: false,
      contentType: false,
      success:function(image, textStatus, jqXHR){
          $('#summernote').summernote('insertImage', image);
          ImageArrayList.push(image);
          //console.log(image);
      },
      error: function(jqXHR, textStatus, errorThrown){
          $('.upload_status').text('Upload Failed !!!');
          $('.modal-backdrop').remove();
          $('#imgloader').remove();
      }
    });
  }
  function save_post_data(){
     var title = $('input[name="title"]').val();
     var body = $('#summernote').summernote('code');
     var header = $('input[name="header"]').is(':checked') ? 1 :0;
     var footer = $('input[name="footer"]').is(':checked') ? 1 :0;
     var status = $('input[name="status"]').is(':checked') ? 1 :0;

     if(!title.length){ alert('Title is Empty'); return 0;}
     if(body.length  == 11) {alert('Body is Empty'); return 0;}
     
     let form = new FormData();
     if({{request()->input('id') ? 'true' : 'false'}})
     form.append('id',$('input[name="id"]').val());
     form.append('title',title);
     form.append('body',body);
     form.append('img',JSON.stringify(ImageArrayList));
     form.append('header', header);
     form.append('footer', footer);
     form.append('status', status);

     var url = base_url+'admin/upload_post_to_server' ;
    if(<?php echo request()->input('id') ? 'true' : 'false'; ?>) url = base_url+'admin/update_post_to_server' ;
     
    $.ajax({
      url : url,
      type: "POST",
      headers: {'X-CSRF-TOKEN': csrf},
      data : form,
      processData: false,
      contentType: false,
      success:function(data, textStatus, jqXHR){
      $('input[name="title"]').val('');
      $('#summernote').summernote('code','');
      // $('input[name="header"]').attrRemove('checked');
      $('input[name="footer"]').removeAttr('checked');
      $('input[name="status"]').removeAttr('checked');
          
      window.location.href = base_url+'admin/settings?group=page' ;
      },
      error: function(jqXHR, textStatus, errorThrown){
          //if fails     
      }
    });
  }


    document.querySelector('body').addEventListener("DOMNodeRemoved", function (event) {
      if(event.target.tagName == 'IMG'){
             if(event.relatedNode.tagName !== 'BODY'){
                 imgPermission = event.target.getAttribute('src'); 
              }
      }
    });

    document.querySelector('body').addEventListener('keyup', function (event) { deleteTempImageVaiBackspase(); });

    function deleteTempImageVaiBackspase(){
        if(imgPermission){
            $.post(base_url+'admin/delete_temp_file',{_token:csrf,img:imgPermission},function(data){
              ImageArrayList.splice(ImageArrayList.indexOf(imgPermission),1);
              console.log(ImageArrayList);
            });
           imgPermission = false ;
        }else{
           imgPermission = false ;
        }
    }
  </script>
@endsection