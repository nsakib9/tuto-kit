  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('backend/backend/dist/img/AdminLTELogo.png')}}" alt="LSKIT Logo" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light">LSKIT 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('images/profile/'.Auth::user()->img) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ url('/profile') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


          @foreach (sidebar() as $bar)
            @if(!$bar['status']) <?php continue; ?> @endif
            <li class="nav-item">
              <a href="{{ $bar['url'] }}" class="nav-link <?php echo menuactive($bar['id']); ?> ">
                <i class="{{ $bar['icon'] }}"></i>
                <p>
                  {{ $bar['name'] }}
                  @if($bar['list']) <i class="right fas fa-angle-left"></i> @endif
                </p>
              </a>
                @if($bar['list'])
                    <ul class="nav nav-treeview">
                      @foreach (sidebar($bar['name']) as $sub)
                        <li class="nav-item">
                          <a href="{{$sub['url']}}" class="nav-link <?php echo menuactive($sub['id'],'sub'); ?>">
                            <i class="{{ $sub['icon'] }}"></i>
                            <p>{{$sub['name']}}</p>
                          </a>
                        </li>
                      @endforeach
                    </ul>
                @endif
            </li>
          @endforeach

        </ul>
      </nav>
      <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
  </aside>
