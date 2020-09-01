<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="{{asset('assets/dist')}}/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            @if (empty(Auth::user()->name))
                <a href="/login" class="btn btn-primary m-auto">Login</a>
            @else
            <div class="image">
                <img src="{{asset('assets/dist')}}/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
            @endif

        </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-question-circle"></i>
              <p>
                Pertanyaan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Semua Pertanyaan</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/pertanyaansya" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pertanyaan Saya</p>
                </a>
              </li>
            </ul>
          </li>
            {{-- <li class="nav-item">
                <a href="/" class="nav-link">
                    <i class="far fa-question-circle nav-icon"></i>
                    <p>Pertanyaan</p>
                </a>
            </li> --}}
            @if (Auth::user())
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="fa fa-hashtag nav-icon"></i>
                    <p>Tags</p>
                </a>
            </li>
            @endif
          {{-- <li class="nav-header">EXAMPLES</li> --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
