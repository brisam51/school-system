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
                        class="nav-link collapsed {{ Route::is('admin.teacher.list') ? 'text-white bg-primary rounded' : '' }} ">
                        <i class="bi bi-people"></i>

                        <span>Teachers</span>
                    </a>
                </div>

            </li>
            <li class="nav-item  ">
                <div>
                    <a href="{{ route('admin.parent.list') }}  "
                        class="nav-link collapsed {{ Route::is('admin.parent.list') ? 'text-white bg-primary rounded' : '' }}">
                        <i class="bi bi-people"></i>

                        <span>Parents</span>
                    </a>
                </div>

            </li>
            {{-- -------------------- --}}
            <li class="nav-item">
                <a class="nav-link collapsed @if (Request::segment(2) == 'exam') bg-primary text-white @endif"
                    data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Examanition</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse @if (Request::segment(2) == 'exam' || Request::segment(2) == 'exam_schedule') show @endif"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ url('admin/exam/list') }}"
                            class="@if (Request::segment(2) == 'exam') text-white border border-warning rounded @endif">
                            <i  class="bi bi-circle"></i><span>Exam</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/exam_schedule') }}"
                            class="@if (Request::segment(2) == 'exam_schedule') text-white border border-warning @endif">
                            <i class="bi bi-circle"></i><span>Exam Schdule</span>
                        </a>
                    </li>

                </ul>
            </li>
            {{-- ======================= --}}
            <li class="nav-item">
                <a class="nav-link  @if (Request::segment(2) == 'class' ||
                        Request::segment(2) == 'subject' ||
                        Request::segment(2) == 'assign-subject' ||
                        Request::segment(3) == 'assigen_class_teacher' ||
                        Request::segment(2) == 'class_timetable') bg-primary text-white @endif "
                    data-bs-target="#components-nav" data-bs-toggle="collapse" href="#" aria-expanded="true">
                    <i class="bi bi-menu-button-wide"></i><span>Acadmic</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse @if (Request::segment(2) == 'class' ||
                        Request::segment(2) == 'subject' ||
                        Request::segment(2) == 'assign-subject' ||
                        Request::segment(3) == 'assigen_class_teacher' ||
                        Request::segment(2) == 'class_timetable' ||
                        Request::segment(2) == ' my_exam_timetable') show @endif "
                    data-bs-parent="#sidebar-nav" style="">
                    <li>
                        <a href="{{ url('admin/class/list') }} "
                            class=" @if (Request::segment(2) == 'class') text-white @endif">
                            <i class="bi bi-circle"></i><span>Class</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/class_timetable/list') }}"
                            class=" @if (Request::segment(2) == 'class_timetable') text-white @endif">
                            <i class="bi bi-circle"></i><span>Class Time Table</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/subject/list') }}"
                            class=" @if (Request::segment(2) == 'subject') text-white @endif">
                            <i class="bi bi-circle"></i><span>Subject</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/assign-subject/list') }}"
                            class=" @if (Request::segment(2) == 'assign-subject') text-white @endif">
                            <i class="bi bi-circle"></i><span>Assigen Subject to Class</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/teacher/assigen_class_teacher/list') }}"
                            class=" @if (Request::segment(3) == 'assigen_class_teacher') text-white @endif">
                            <i class="bi bi-circle"></i><span>Assigen Class To Teacher</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item  ">
                <div>
                    <a class="nav-link collapsed @if (Request::segment(2) == 'change_password') bg-primary text-white @endif"
                        href="{{ url('admin/change_password') }}">
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
                <a class="nav-link  {{ Route::is('student.my_timetable') ? 'text-white bg-primary rounded' : '' }}"
                    href="{{ route('student.my_timetable') }}">
                    <i class="bi bi-grid"></i>
                    <span>My Timetable</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ url(Request::segment(2) == 'my_exam_timetable') ? 'text-white bg-primary rounded' : '' }}"
                    href="{{ url('student/my_exam_timetable') }}">
                    <i class="bi bi-grid"></i>
                    <span>My Exam Timetable</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ url(Request::segment(2) == 'account') ? 'text-white bg-primary rounded' : '' }} "
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
                <a class="nav-link @if (Request::segment(2) == 'dashboard') bg-primary text-white @endif "
                    href="{{ url('teacher/dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link @if (Request::segment(2) == 'mystudent') bg-primary text-white @endif"
                    href="{{ url('teacher/mystudent') }}">
                    <i class="bi bi-grid"></i>
                    <span>My student</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link @if (Request::segment(2) == 'account') bg-primary text-white @endif "
                    href="{{ url('teacher/account') }}">
                    <i class="bi bi-grid"></i>
                    <span>My Account</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link @if (Request::segment(2) == 'class_subject' || Request::segment(2) == 'my_class_timetable') bg-primary text-white @endif "
                    href="{{ url('teacher/class_subject') }}">
                    <i class="bi bi-grid"></i>
                    <span>My Class & Subject</span>
                </a>
            </li>
             <li class="nav-item">
                <a class="nav-link @if (Request::segment(2) == 'my_exam_timetable') bg-primary text-white @endif"
                    href="{{ url('teacher/my_exam_timetable') }}">
                    <i class="bi bi-grid"></i>
                    <span>My Exam Timetable</span>
                </a>
            </li>
            <li class="nav-item  ">
                <div>
                    <a class="nav-link @if (Request::segment(2) == 'change_password') bg-primary text-white @endif"
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
            <a class="nav-link collapsed  " href="{{ url('logout') }}">
                <i class="bi bi-file-earmark"></i>
                <span>Logout</span>
            </a>
        </li><!-- End log out Page Nav -->


    </ul>

</aside>
