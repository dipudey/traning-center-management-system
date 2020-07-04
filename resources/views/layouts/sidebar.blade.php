<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">

    <div class="slimscroll-menu" id="remove-scroll">

        <!-- LOGO -->
        <div class="topbar-left">
            <a href="" class="logo">
                <span>
                    <img src="{{ asset('dashboard_assets') }}/assets/images/logo.png" alt="" height="50" width="100">
                </span>
                <i>
                  {{-- @if (Auth::user()->picture != '')
                    <img src="{{ asset('uploads/users') }}/{{ Auth::user()->picture }}" alt="" height="28">
                  @else
                    <img src="{{ asset('dashboard_assets') }}/assets/images/logo_sm.png" alt="" height="28">
                  @endif --}}
                </i>
            </a>
        </div>

        <!-- User box -->
        <div class="user-box">
            <div class="user-img">
              @if (Auth::user()->picture != '')
                <img src="{{ asset('uploads/users') }}/{{ Auth::user()->picture }}" alt="" height="70" style="border-radius:50% !important">
              @else
                <img src="{{ asset('dashboard_assets') }}/assets/images/logo_sm.png" alt="" height="28">
              @endif
                {{-- <img src="{{ asset('dashboard_assets') }}/assets/images/users/avatar-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid"> --}}
            </div>
            <h5 class="mt-5"><a href="#">{{ Auth::user()->name }}</a> </h5>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <!--<li class="menu-title">Navigation</li>-->

                <li>
                    <a href="{{ url('/home') }}">
                        <i class="fi-air-play"></i> <span> Dashboard </span>
                    </a>
                </li>
                @can('cource')
                  <li>
                      <a><i class="fi-layers"></i> <span> Cource Manage </span> <span class="menu-arrow"></span></a>
                      <ul class="nav-second-level">
                          <li><a href="{{ url('add/cource') }}">Add Cource</a></li>
                          <li><a href="{{ url('all/cource') }}">All Cource</a></li>
                      </ul>
                  </li>
                @endcan

                @can ('batch')
                  <li>
                      <a><i class="mdi mdi-bootstrap"></i> <span> Batch Manage </span> <span class="menu-arrow"></span></a>
                      <ul class="nav-second-level">
                          <li><a href="{{ url('batch/add') }}">Add Batch</a></li>
                          <li><a href="{{ url('batch/search/courcewise') }}">Cource wise Batch</a></li>
                          <li><a href="{{ url('batch/all') }}">All Batch</a></li>
                      </ul>
                  </li>
                @endcan

                @can ('student')
                  <li>
                      <a><i class="mdi mdi-account-multiple"></i> <span> Student Manage </span> <span class="menu-arrow"></span></a>
                      <ul class="nav-second-level">
                          <li><a href="{{ url('student/add') }}">Add Student</a></li>
                          <li><a href="{{ url('student/all') }}">All Student</a></li>
                          <li><a href="{{ route('student.cource.wise') }}">Student Cource Wise</a></li>
                      </ul>
                  </li>
                @endcan

                @can ('payment')
                  <li>
                      <a><i class="mdi mdi-briefcase"></i> <span> Payment </span> <span class="menu-arrow"></span></a>
                      <ul class="nav-second-level">
                          <li><a href="{{ route('payment') }}">Get Payment</a></li>
                          <li><a href="{{ route('payment-cource-wise') }}">All Payment</a></li>
                      </ul>
                  </li>
                @endcan

                @can ('attendance')
                  <li>
                      <a><i class="mdi mdi-angular"></i> <span> Attendance </span> <span class="menu-arrow"></span></a>
                      <ul class="nav-second-level">
                          <li><a href="{{ route('take-attendance') }}">Take Attendance</a></li>
                          <li><a href="{{ route('all-attendance') }}">All Attendance</a></li>
                      </ul>
                  </li>
                @endcan

                @can ('expense')
                  <li>
                      <a><i class="fa fa-briefcase"></i> <span> Expense </span> <span class="menu-arrow"></span></a>
                      <ul class="nav-second-level">
                          <li><a href="{{ route('expense-add') }}">Add Expense</a></li>
                          <li><a href="{{ route('expense-today') }}">Today Expense</a></li>
                          <li><a href="{{ route('monthly-expense') }}">Monthly Expense</a></li>
                      </ul>
                  </li>
                @endcan

                @can ('user')
                  <li>
                      <a><i class="mdi mdi-account-plus"></i> <span> User </span> <span class="menu-arrow"></span></a>
                      <ul class="nav-second-level">
                          <li><a href="{{ route('add-user') }}">Create User</a></li>
                          <li><a href="{{ route('all-user') }}">All User</a></li>
                          <li><a href="{{ route('roles.create') }}">Add User Role</a></li>
                          <li><a href="{{ route('roles.index') }}">All Role</a></li>
                      </ul>
                  </li>
                @endcan



            </ul>

        </div>
        <!-- Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
