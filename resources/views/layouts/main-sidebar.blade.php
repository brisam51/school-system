<aside id="sidebar" class="sidebar">
    {{-- @if (Auth::user()->type == 1)
    $bg-color="green"
  @endif --}}

    <ul class="sidebar-nav" id="sidebar-nav">

        @if (Auth::user()->user_type == 1)
            <li class="nav-item">
                <a class="nav-link  " href="{{ url('admin/dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item  ">
                <div>
                    <a href="{{ url('admin/list') }}  "
                        class="nav-link collapsed {{ request()->is('admin/alluser') ? 'active' : '' }}">
                        <i class="bi bi-people"></i>

                        <span>Admin</span>
                    </a>
                </div>

            </li>
            <li class="nav-item  ">
                <div>
                    <a href="{{ url('admin/class/list') }}  "
                        class="nav-link collapsed {{ request()->is('admin/class/list') ? 'active' : '' }}">
                        <i class="bi bi-people"></i>

                        <span>Class</span>
                    </a>
                </div>

            </li>

        @elseif(Auth::user()->user_type == 2)
            <li class="nav-item">
                <a class="nav-link " href="{{ url('student/dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->
        @elseif(Auth::user()->user_type == 3)
            <li class="nav-item">
                <a class="nav-link " href="{{ url('teacher/dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->
        @elseif(Auth::user()->user_type == 4)
            <li class="nav-item">
                <a class="nav-link " href="{{ url('parent/dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->
        @endif



        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('logout') }}">
                <i class="bi bi-file-earmark"></i>
                <span>Logout</span>
            </a>
        </li><!-- End log out Page Nav -->

        {{-- <li class="nav-item">
      <a class="nav-link collapsed" href="pages-blank.html">
        <i class="bi bi-file-earmark"></i>
        <span>Blank</span>
      </a>
    </li><!-- End Blank Page Nav --> --}}

    </ul>

</aside>
