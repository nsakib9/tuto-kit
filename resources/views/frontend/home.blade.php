@extends('frontend.layouts.app')
@section('title', 'LMS.lskit.com | Find your course')
@section('main_content')


    <!-- Banner -->
    <section class="main-banner">
        <div class="overlay">
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
                <div class="content">
                    <div class="row">
                        <div class="@guest col-md-6 col-sm-12 @endguest">
                            <div class="typography">
                                <h3>It is a long established fact</h3>
                                <p>It is a long established fact that a reader will be distracted by the readable
                                    content of a page when looking at its layout. The point of using Lorem Ipsum is
                                    that
                                    it has a more-or-less normal distribution of letters, as
                                    opposed to using 'Content here, content here'
                                </p>
                                <ul>
                                    <li>This is list</li>
                                    <li>This is list</li>
                                    <li>This is list</li>
                                </ul>
                                <a href="#" class="btn">This is Button</a>
                            </div>
                        </div>
                        @guest
                        <div class="col-md-6 col-sm-12">
                            <div class="form">
                                <h3>Make Sure Your Registration</h3>
                                <form action="{{ url('register?group=student') }}" method="post">
                                    @csrf
                                        <input class="form-control" type="text" name="name" placeholder="Name">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <input class="form-control" type="email" name="email" placeholder="Email">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span> 
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <input class="form-control" type="text" name="phone" placeholder="Phone">
                                        </div>
                                    </div>
                                    
                                    <select class="form-select" name="course" aria-label="Default select example">
                                        <option selected>Select Course</option>
                                        @foreach ($class as $row)
                                        <option value="{{$row->id}}">{{$row->title}}</option>
                                        @endforeach
                                    </select>
                                    <input class="form-control" type="password" name="password" placeholder="Password">
                                    <button class="btn" type="submit">Register</button>
                                </form>
                            </div>
                        </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Banner -->

    <!-- Courses -->
    <section class="courses">
        <div class="container">
            <div class="title a-h1">
                <h1>We Offered</h1>
            </div>

            

            <div class="row g-4">

            @foreach($class as $row)

                <div class="col-lg-3 col-md-6 col-sm-12 course">
                    <div class="course-con">
                        <div class="image">
                            <img src="{{asset('images/'.$row->img)}}" alt="...">
                        </div>
                        <div class="heading">
                            <a href="#">{{$row->title}}</a>
                        </div>
                        <div class="description">
                            <p>{{$row->description}}</p>
                        </div>
                    </div>
                </div>

            @endforeach

            </div>
        </div>
    </section>
    <!-- /Courses -->


    <!-- Testimonial -->
    <div class="mt-5"></div>
    <div class="title a-h1">
        <h1>Our Client Says</h1>
    </div>
    <section class="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="testimonial">

                        <div class="row">
                            @foreach ($review as $row)
                            <div class="col-md-4">
                                <div class="item">
                                    <div class="image">
                                        <img src="{{asset('images/review/'.$row->img)}}" width="100" alt="...">
                                    </div>
                                    <div class="bio">
                                        <div class="icon">
                                            <i class="bi bi-chat-right-quote"></i>
                                        </div>
                                        <div class="author">
                                            <a href="#">{{$row->title}}</a>
                                            <p>{{$row->subtitle}}</p>
                                        </div>
                                    </div>
                                    <div class="quotation">
                                        <p>{{$row->body}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Testimonial -->


    <!-- Popular Lessons -->
    <!-- <div class="mt-5"></div>
    <div class="title a-h1">
        <h1>Popular Lessons</h1>
    </div>
    <section class="pupular-lesson">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="lessons">
                        <li class="lesson">Macebth</li>
                        <li class="lesson">Hamlet</li>
                        <li class="lesson">Preface to Shakespeare</li>
                        <li class="lesson">Robinson Crusoe</li>
                        <li class="lesson">Pilgrims Progress</li>
                        <li class="lesson">A Doll's House</li>
                        <li class="lesson">Pygmalion</li>
                        <li class="lesson">Heart Of Darkness</li>
                        <li class="lesson">Metamorphosis</li>
                        <li class="lesson">The Dumb Waiter</li>
                        <li class="lesson">Arms and the men</li>
                        <li class="lesson">Riders to the sea</li>
                    </ul>
                </div>
            </div>
        </div>
    </section> -->
    <?php
    $content = App\Models\Option::where('type','lesson')->first()->content;
    ?>
    {!! $content !!}
    <!-- /Popular Lessons -->


@endsection