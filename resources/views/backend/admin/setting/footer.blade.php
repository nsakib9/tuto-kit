@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('main_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Footer Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Setting</li>
              <li class="breadcrumb-item active">Footer</li>
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
              </div>
              <!-- /.card-header -->
              <div class="card-body">


    <!-- //// First Column -->
            <form action="{{ url('admin/settings_update?group=footer') }}" method="post">
            @csrf
              <label for="">First Column</label>
              <textarea id="codeMirrorDemo" name="content" class="p-3">{{ isset($foot[0]) ? $foot[0] : '' }}</textarea>
              <input type="hidden" name="status" value="1">
              <button type="submit" class="btn btn-primary">Save</button>
             </form><hr>



                <!-- //// 2nd Column -->
            <form action="{{ url('admin/settings_update?group=footer') }}" method="post">
            @csrf
              <label for="">Secend Column</label>
              <textarea id="codeMirrorDemo2" name="content" class="p-3">{{isset($foot[1]) ? $foot[1] : ''}}</textarea>
              <input type="hidden" name="status" value="2">
              <button type="submit" class="btn btn-primary">Save</button>
            </form><hr>




              <!-- //// 3nd Column -->
            <form action="{{ url('admin/settings_update?group=footer') }}" method="post">
            @csrf
              <label for="">Third Column</label>
              <textarea id="codeMirrorDemo3" name="content" class="p-3">{{isset($foot[2]) ? $foot[2] : ''}}</textarea>
              <input type="hidden" name="status" value="3">
              <button type="submit" class="btn btn-primary">Save</button>
            </form><hr>



              <!-- //// 4th Column -->
            <form action="{{ url('admin/settings_update?group=footer') }}" method="post">
            @csrf
              <label for="">Forth Column</label>
              <textarea id="codeMirrorDemo4" name="content" class="p-3">{{isset($foot[3]) ? $foot[3] : ''}}</textarea>
              <input type="hidden" name="status" value="4">
              <button type="submit" class="btn btn-primary">Save</button>
            </form>


                          <!-- //// 5th Column -->
            <form action="{{ url('admin/settings_update?group=footer') }}" method="post">
            @csrf
              <label for="">Fifth Column</label>
              <textarea id="codeMirrorDemo5" name="content" class="p-3">{{isset($foot[4]) ? $foot[4] : ''}}</textarea>
              <input type="hidden" name="status" value="5">
              <button type="submit" class="btn btn-primary">Save</button>
            </form>
              </div>

            </div>
    </div>
</div>

@endsection
@section('js')
  <script>
    $(function () {
    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      tabSize: 8,
      theme: "monokai"
    });
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo2"), {
      mode: "htmlmixed",
      tabSize: 8,
      theme: "monokai"
    });
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo3"), {
      mode: "htmlmixed",
      tabSize: 8,
      theme: "monokai"
    });
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo4"), {
      mode: "htmlmixed",
      tabSize: 8,
      theme: "monokai"
    });
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo5"), {
      mode: "htmlmixed",
      tabSize: 8,
      theme: "monokai"
    });
  })
  </script>
@endsection