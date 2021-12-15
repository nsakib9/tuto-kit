@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('main_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Logo Setup</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Setting</li>
              <li class="breadcrumb-item active">Logo</li>
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
                <!-- <h3 id="create" class="">Logo Setup</h3> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="{{asset('images/logo/'.$logo->logoimg)}}" height="{{$logo->height}}" width="{{$logo->width}}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <p>height : {{$logo->height}}</p>
                                        <p>width : {{$logo->width}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <button id="create" class="btn btn-primary">Change</button>
                                        </td>
                                    </tr>
                                </tbody>
                              </table>
                        </div>
                        <div class="col-md-6">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="{{asset('images/logo/'.$fevicon->logoimg)}}" height="{{$logo->height}}" width="{{$logo->width}}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <p>height : {{$fevicon->height}}</p>
                                        <p>width : {{$fevicon->width}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <button id="create-fev" class="btn btn-primary">Change</button>
                                        </td>
                                    </tr>
                                </tbody>
                              </table>
                        </div>
                    </div>

              </div>
            </div>
    </div>
</div>
<form action="{{ url('/admin/settings?group=logo') }}" method="post" enctype="multipart/form-data">
    @csrf
<div id="modale_area"></div>
</form>

<form action="{{ url('/admin/settings?group=fevicon') }}" method="post" enctype="multipart/form-data">
    @csrf
<div id="modale_area_fevicon"></div>
</form>

@endsection
@section('js')
  <script>
        $('button[id="create"]').click(function(){
            $.get(base_url+'admin/settings_modal?group=logo',function(data){
                console.log(data);
                $('#modale_area').html(data.html);
                $('#logoSet').modal('show');
            });
        });
  </script>
    <script>
        $('button[id="create-fev"]').click(function(){
            $.get(base_url+'admin/settings_modal?group=fevicon',function(data){
                console.log(data);
                $('#modale_area_fevicon').html(data.html);
                $('#logoSet').modal('show');
            });
        });
  </script>
@endsection
