@extends('frontend.layouts.app')
@section('title', 'Carreer | LMS.lskit.com')
@section('main_content')

 <!-- Career -->
 <section class="career">
        <!-- Infromation -->
        <div class="information">
            <div class="container">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{{ Session::get('success') }}</li>
                        </ul>
                    </div>
                @endif
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
        </div>
        <!-- /Infromation -->


        <!-- Form -->
        <div class="form">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form action="{{ url('contact') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-12 field-wrp">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
                                </div>

                                <div class="col-md-6 col-sm-12 field-wrp">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                </div>

                                <div class="col-md-12 col-sm-12 field-wrp">
                                    <label for="cv" class="form-label">Massage </label>
                                    <textarea class="form-control" type="text" name="massage" id=""></textarea>
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