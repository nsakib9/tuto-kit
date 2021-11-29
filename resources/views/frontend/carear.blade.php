@extends('frontend.layouts.app')
@section('title', 'Carreer | LMS.lskit.com')
@section('main_content')

 <!-- Career -->
 <section class="career">
        <!-- Infromation -->
        <div class="information">
            <div class="container">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{ request()->path() }}
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="typography a-h1">
                            <h1>Career</h1>
                            <p>It is a long established fact that a reader will be distracted by the readable content of
                                a page when looking at its layout. The point of using Lorem Ipsum is that it has a
                                more-or-less normal distribution of letters, as opposed to using 'Content here, content
                                here', making it look like readable English. Many desktop publishing packages and web
                                page editors now use Lorem Ipsum as their default model text, and a search for 'lorem
                                ipsum' will uncover many web sites still in their infancy. Various versions have evolved
                                over the years, sometimes by accident, sometimes on purpose (injected humour and the
                                like).</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Infromation -->


        <!-- Form -->
        <div class="form">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form action="{{ url('register?group=teacher') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-12 field-wrp">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
                                </div>

                                <div class="col-md-6 col-sm-12 field-wrp">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
                                </div>

                                <div class="col-md-6 col-sm-12 field-wrp">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                </div>
                                @php
                                    $class = App\Models\Course::get();
                                @endphp
                                <div class="col-md-6 col-sm-12 field-wrp">
                                    <label for="expert-in" class="form-label">Expert In</label>
                                    <select class="form-select" name="expertIn[]" aria-label="expert-in" multiple>
                                        @foreach ($class as $row)
                                        <option value="{{$row->id}}">{{$row->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 col-sm-12 field-wrp">
                                    <label for="educational-qualification" class="form-label">Educational
                                        Qualification</label>
                                    <select class="form-select" name="eq" aria-label="educational-qualification">
                                        <option></option>
                                        <?php echo getOption('eq'); ?>
                                    </select>
                                </div>

                                <div class="col-md-6 col-sm-12 field-wrp">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" name="Address" id="address" placeholder="Address">
                                </div>
                                <div class="col-md-6 col-sm-12 field-wrp">
                                    <label for="cv" class="form-label">Curriculum Vitae (CV)</label>
                                    <input class="form-control" type="file" name="cv" id="cv">
                                </div>
                                <div class="col-md-6 col-sm-12 field-wrp">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                </div>
                                <div class="col-md-12 col-sm-12 field-wrp">
                                    <label for="cv" class="form-label">Note</label>
                                    <textarea class="form-control" type="text" name="note" id=""></textarea>
                                </div>
                            </div>
                            <div class="button">
                                <button class="btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Form -->
    </section>
    <!-- /Career -->

@endsection