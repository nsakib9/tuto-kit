   <!-- Header -->
    <!-- Bar -->
    <div class="bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="anchor-list">
                        <a href="#"><i class="bi bi-house"></i> Home</a>
                        <a href="#">About</a>
                        <a href="#">Blog</a>
                        <a href="#">FAQ</a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="contact-list">
                        <p><i class="bi bi-telephone"></i> +8801111******</p>
                        <p>
                            <a href="mailto:example@example.com"><i class="bi bi-envelope"></i> example@example.com</a>
                        </p>
                        <p class=" d-inline-block m-0"><i class="bi bi-clock"></i> 07.30AM-07.30PM</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Bar -->
    <!-- Nav -->
    <?php
    $menu = App\Models\Menu::where('status',1)->get();
    ?>
    <div class="nav sticky-top main-menu">
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="{{ url('/') }}">
                        <?php echo logo() ; // App\Helper\frontend\base_url  ?>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="bi bi-hash"></span>
                                  </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav m-auto me-0">
                                @foreach ($menu as $row)
                                    @if($row->is_sub == 1)
                                    @continue
                                    @endif
                                    @continue($row->url == '/login' && Auth::check())
                                    @continue($row->url == '/career' && Auth::check())
                                    @continue($row->url == '/logout' &&!Auth::check())
                                    @if($row->dropdown == 1)

                                    <li class="nav-item dropdown">
                                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{$row->title}}<i class="bi bi-plus"></i></a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        @foreach ($menu as $sub)
                                            @if($sub->is_sub == 0 || $sub->main_id !== $row->id)
                                            @continue
                                            @endif
                                        <li><a class="dropdown-item" href="{{$sub->url}}">{{$sub->title}}</a></li>
                                        @endforeach
                                    </ul>
                                    </li>
                                    @else
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is($row->url) ? 'active' : '' }}" aria-current="page" href="{{ $row->url }}">{{ $row->title }}</a>
                                    </li>
                                    @endif
                                @endforeach
                                <!-- <li class="nav-item">
                                    <a class="nav-link " aria-current="page" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('career')}}">Career</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown link <i class="bi bi-plus"></i></a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Pricing</a>
                                </li> -->
                                <!-- <li class="nav-item dropdown">
                                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown link <i class="bi bi-plus"></i></a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="bi bi-whatsapp"></i>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a  class="nav-link" href="{{route('login')}}">Login</a>
                                </li> -->
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- /Nav -->
    <!-- /Header -->
