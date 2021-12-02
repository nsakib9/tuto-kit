@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('main_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
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
              <!-- <div class="card-header">
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
                <div class="bg-dark p-2">Profile Image</div>
                <div class="text-center">
                    <img class="rounded-circle" src="{{ asset('images/profile/'.Auth::user()->img) }}" width="350" height="280" alt="Profile.jpg">
                </div>
                <br>
                <form action="{{ route('profile.image') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="group-form">
                        <input class="form-control" type="file" name="image">
                </div>
                <input type="hidden" name="id" value="{{ Auth::id() }}">
                <button style="margin-left : 34vw ;" class="btn btn-primary">Chenge Image</button>
                </form>
                <br>

                <form action="{{ route('profile.info') }}" method="post">
                @csrf
                <div class="bg-dark p-2">Profile Info</div>
                <br>
                <div>
                    <div class="group-form">
                        <label for="">Name</label>
                        <input class="form-control" type="text" name="name" value="{{Auth::user()->name}}">
                    </div>
                @if(is_student())
                    <div class="group-form">
                        <label for="">Course</label>
                        <select class="form-control" name="course" id="" disabled >
                            <option value="">Select Course</option>
                            @foreach($course as $row)
                            <option value="{{$row->id }}" <?php echo $row->id == Auth::user()->course ? 'selected' : '' ; ?>>{{ $row->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="group-form">
                        <label for="">Parent's Phone</label>
                        <input type="text" class="form-control" name="parentPhone" value="{{Auth::user()->parentPhone}}" placeholder="Parent' Phone">
                    </div>
                @elseif(is_teacher())
                    <div class="group-form">
                        <label for="">Expert In</label>
                        <select class="form-control" name="expertIn[]" id="" multiple>
                        <?php $arr = json_decode(Auth::user()->expertIn??[000,000],true); ?>
                            @foreach($course as $row)
                            <option value="{{ $row->id }}" <?php echo in_array($row->id,(Array)$arr) ? 'selected' : '' ; ?>>{{ $row->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="group-form">
                        <label for="">Educational Qualification</label>
                        <select class="form-control" name="eq" id="">
                            <option value="">Select Course</option>
                            <?php echo getOption('eq',Auth::user()->eq); ?>
                        </select>
                    </div>
                @endif
                </div>

                @if (is_student())
                <br>
                <div class="bg-dark p-2">Subjects</div>
                <ul class="list-group mt-2">
                    @foreach ($subjects as $subject)
                        <li class="list-group-item">
                            <div class="form-check">
                                <input
                                class="form-check-input"
                                type="checkbox"
                                name="subjects[]"
                                value="{{ $subject->id }}"
                                id="flexCheckDefault"
                                />
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{ $subject->title }}
                                </label>
                            </div>
                        </li>
                    @endforeach
                </ul>
                @endif

                <br>
                <div class="bg-dark p-2">Profile Contact</div>
                <br>
                <div>
                    <div class="group-form">
                        <label for="">Email</label>
                        <input class="form-control" type="email" name="email" value="{{Auth::user()->email}}">
                    </div>
                    <div class="group-form">
                        <label for="">Phone</label>
                        <input class="form-control" type="text" name="phone" value="{{Auth::user()->phone}}">
                    </div>
            @if(is_teacher())
                    <div class="group-form">
                        <label for="">Address</label>
                        <input class="form-control" type="text" name="Address" value="{{Auth::user()->Address}}">
                    </div>
                </div>
                <br>

                <div class="bg-dark p-2">Extra</div>
                <br>
                    <div class="group-form">
                        <label for="">Note</label>
                        <textarea class="form-control" name="note" id="" cols="" rows="2">{{Auth::user()->note}}</textarea>
                    </div>
                    <br>
            @endif
            <input type="hidden" name="id" value="{{Auth::id()}}">
                <button class="btn btn-success" type="submit">Update Profile</button>
              </div>
            </div>
</form>
            <!-- Password Changeer -->
            <!-- <div class="card">
              <div class="card-body">

              </div>
            </div> -->
    </div>
</div>
@endsection
@section('js')

@endsection
