<aside id="sidebar" class="sidebar  text-bg-secondary p-3" style="width: 17rem">

    <ul class="sidebar-nav" id="sidebar-nav">

        @if (Auth::user()->user_type == 1)
            <li class="nav-item  ">

                <a class="nav-link {{ Route::is('admin.dashboard') ? 'text-white bg-primary rounded' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-grid text-white"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ Route::is('admin.myaccount') ? 'text-white bg-primary rounded' : '' }}"
                    href="{{ url('admin/account') }}">
                    <i class="bi bi-grid"></i>
                    <span>My Account</span>
                </a>
            </li>

            <li class="nav-item  ">
                <div>
                    <a href="{{ url('admin/list') }}  "
                        class="nav-link  {{ Route::is('admin.list') ? 'text-white bg-primary rounded' : '' }}">
                        <i class="bi bi-people"></i>

                        <span>Admin</span>
                    </a>
                </div>

            </li>
            {{-- student section start --}}
            <li class="nav-item  ">
                <div>
                    <a href="{{ route('admin.student.list') }}  "
                        class=" nav-link collapsed {{ Route::is('admin.student.list') ? 'text-white bg-primary rounded' : '' }}">
                        <i class="bi bi-people"></i>

                        <span>Student</span>
                    </a>
                </div>

            </li>
            <li class="nav-item  ">
                <div>
                    <a href="{{ route('admin.teacher.list') }}  "
                        class="nav-link collapsed  {{ Route::is('admin.teacher.list') ? 'text-white bg-primary rounded' : '' }} ">
                        <i class="bi bi-people"></i>

                        <span>Teachers</span>
                    </a>
                </div>

            </li>
            <li class="nav-item  ">
                <div>
                    <a href="{{ route('admin.parent.list') }}  " class="nav-link collapsed ">
                        <i class="bi bi-people"></i>

                        <span>Parents</span>
                    </a>
                </div>

            </li>

            <li class="nav-item ">

                <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#"
                    aria-expanded="true">

                    <i class="bi bi-journal-text"></i><span>Acadmics</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse bg-white " data-bs-parent="#sidebar-nav">
                    <li>
                        <div>
                            <a href="{{ url('admin/class/list') }}  "
                                class="nav-link collapsed {{ request()->is('admin/class/list') ? 'bg-primary text-white' : '' }} ">
                                <i class="bi bi-tag"></i>

                                <span>Class</span>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item  ">
                        <div>
                            <a href="{{ url('admin/subject/list') }}  "
                                class="nav-link collapsed {{ request()->is('admin/subject/list') ? 'bg-primary text-white' : '' }}">
                                <i class="bi bi-tag"></i>

                                <span>Subject</span>
                            </a>
                        </div>

                    </li>
                    <li class="nav-item  ">
                        <div>
                            <a class="nav-link collapsed {{ request()->is('admin/assign-subject/list') ? 'bg-primary text-white' : '' }} "
                                href="{{ url('admin/assign-subject/list') }}">
                                <i class="bi bi-tag"></i>

                                <span>Assign Subject To Class</span>
                            </a>
                        </div>

                    </li>
                    <li class="nav-item  ">
                        <div>
                            <a class="nav-link collapsed  {{ request()->is('admin/teacher/assigen_class_teacher/list') ? 'bg-primary text-white' : '' }}"
                                href="{{ url('admin/teacher/assigen_class_teacher/list') }}  ">
                                <i class="bi bi-tag"></i>
                                <span>Assigen Class To Teacher</span>

                            </a>
                        </div>

                    </li>
                </ul>
            </li>

            {{-- end dropmenu --}}

            {{-- <li class="nav-item  ">
                <div>
                    <a href="{{ url('admin/class/list') }}  "
                        class="nav-link collapsed {{ request()->is('admin/class/list') ? 'active' : '' }}">
                        <i class="bi bi-tag"></i>

                        <span>Class</span>
                    </a>
                </div>

            </li> --}}
            {{-- subject section start --}}
            {{-- <li class="nav-item  ">
                <div>
                    <a href="{{ url('admin/subject/list') }}  "
                        class="nav-link collapsed {{ request()->is('admin/subject/list') ? 'active' : '' }}">
                        <i class="bi bi-tag"></i>

                        <span>Subject</span>
                    </a>
                </div>

            </li> --}}
            {{-- <li class="nav-item  ">
                <div>
                    <a class="nav-link collapsed" href="{{ url('admin/assign-subject/list') }}">
                        <i class="bi bi-tag"></i>

                        <span>Assign Subject To Class</span>
                    </a>
                </div>

            </li> --}}
            {{-- <li class="nav-item  ">
                <div>
                    <a class="nav-link collapsed {{ Route::is('assigen.class.list')?'text-white bg-primary ':'' }}" href="{{ url('admin/teacher/assigen_class_teacher/list') }}  ">
                        <i class="bi bi-tag"></i>
                        <span>Assigen Class To Teacher</span>

                    </a>
                </div>

            </li> --}}
            <li class="nav-item  ">
                <div>
                    <a class="nav-link collapsed" href="{{ url('admin/change_password') }}  ">
                        <i class="bi bi-tag"></i>
                        <span>Change Password</span>

                    </a>
                </div>

            </li>
            {{-- start change password --}}
        @elseif(Auth::user()->user_type == 2)
            <li class="nav-item">
                <a class="nav-link {{ Route::is('student.dashboard') ? 'text-white bg-primary rounded' : '' }}"
                    href="{{ url('student/dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link  {{ Route::is('student.my_subject') ? 'text-white bg-primary rounded' : '' }}"
                    href="{{ route('student.my_subject') }}">
                    <i class="bi bi-grid"></i>
                    <span>My Subject</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('student.account') ? 'text-white bg-primary rounded' : '' }} "
                    href="{{ url('student/account') }}">
                    <i class="bi bi-grid"></i>
                    <span>My Account</span>
                </a>
            </li>
            <li class="nav-item  ">
                <div>
                    <a class="nav-link" href="{{ url('student/change_password') }}">
                        <i class="bi bi-tag"></i>
                        <span>Change Password</span>

                    </a>
                </div>
            </li>
            {{-- start teacher section --}}
        @elseif(Auth::user()->user_type == 3)
            <li class="nav-item">
                <a class="nav-link {{ Route::is('teacher.dashboard') ? 'text-white bg-primary rounded' : '' }} "
                    href="{{ url('teacher/dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Route::is('teacher.mystudent') ? 'text-white bg-primary rounded' : '' }} "
                    href="{{ route('teacher.mystudent') }}">
                    <i class="bi bi-grid"></i>
                    <span>My student</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Route::is('teacher.account') ? 'text-white bg-primary rounded' : '' }} "
                    href="{{ route('teacher.account') }}">
                    <i class="bi bi-grid"></i>
                    <span>My Account</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link {{ Route::is('teacher.class_subject') ? 'text-white bg-primary rounded' : '' }} "
                    href="{{ route('teacher.class_subject') }}">
                    <i class="bi bi-grid"></i>
                    <span>My Class & Subject</span>
                </a>
            </li>
            <li class="nav-item  ">
                <div>
                    <a class="nav-link  {{ Route::is('teacher.change.password') ? 'text-white bg-primary rounded' : '' }} "
                        href="{{ url('teacher/change_password') }}">
                        <i class="bi bi-tag"></i>
                        <span>Chang Password</span>

                    </a>
                </div>

            </li>
        @elseif(Auth::user()->user_type == 4)
            <li class="nav-item">
                <a class="nav-link " href="{{ url('parent/dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Route::is('parent.my_student_parent') ? 'text-white bg-primary rounded' : '' }}  "
                    href="{{ route('parent.my_student_parent') }}">
                    <i class="bi bi-grid"></i>
                    <span>My Student</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  " href="{{ url('parent/account') }}">
                    <i class="bi bi-grid"></i>
                    <span>My Account</span>
                </a>
            </li>
            <li class="nav-item">
                <div>
                    <a class="nav-link" href="{{ url('teacher/change_password') }}">
                        <i class="bi bi-tag"></i>
                        <span>Chang Password</span>

                    </a>
                </div>
            </li>
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
