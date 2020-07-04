<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('dashboard_assets') }}/assets/images/favicon.ico">
        <!-- Bootstrap fileupload css -->
        <link href="{{ asset('dashboard_assets') }}/plugins/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" />
        <!-- Selector2 -->

        <link href="{{ asset('dashboard_assets') }}/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="{{ asset('dashboard_assets') }}/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
        <link href="{{ asset('dashboard_assets') }}/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('dashboard_assets') }}/plugins/switchery/switchery.min.css">
        <!-- DataTables -->
        <link href="{{ asset('dashboard_assets') }}/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard_assets') }}/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{ asset('dashboard_assets') }}/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Multi Item Selection examples -->
        <link href="{{ asset('dashboard_assets') }}/plugins/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />+

        <!-- App css -->
        <link href="{{ asset('dashboard_assets') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard_assets') }}/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard_assets') }}/assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard_assets') }}/assets/css/style.css" rel="stylesheet" type="text/css" />
        {{-- toastr --}}
        <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet" type="text/css" />

        <script src="{{ asset('dashboard_assets') }}/assets/js/modernizr.min.js"></script>

    </head>


    <body>

        <!-- Begin page -->
        <div id="wrapper">

            @include('layouts.sidebar')



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

            <div class="content-page">

                <!-- Top Bar Start -->
                <div class="topbar">

                    <nav class="navbar-custom">

                        <ul class="list-unstyled topbar-right-menu float-right mb-0">



                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <i class="fi-bell noti-icon"></i>
                                    {{-- <span class="badge badge-danger badge-pill noti-icon-badge">4</span> --}}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">

                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h5 class="m-0"><span class="float-right"><a href="" class="text-dark"><small>Clear All</small></a> </span>Notification</h5>
                                    </div>

                                    <div class="slimscroll" style="max-height: 230px;">
                                        <!-- item-->
                                        {{-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-success"><i class="mdi mdi-comment-account-outline"></i></div>
                                            <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">1 min ago</small></p>
                                        </a> --}}


                                    </div>

                                    <!-- All-->
                                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                        View all <i class="fi-arrow-right"></i>
                                    </a>

                                </div>
                            </li>

                            <li class="dropdown notification-list">
                                {{-- <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <i class="fi-speech-bubble noti-icon"></i>
                                    <span class="badge badge-custom badge-pill noti-icon-badge">6</span>
                                </a> --}}

                            </li>

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                   @if (Auth::user()->picture)
                                     <img src="{{ asset('uploads/users/'.Auth::user()->picture) }}" alt="user" class="rounded-circle"> 
                                   @else
                                     <img src="{{ asset('dashboard_assets') }}/assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
                                   @endif
                                    <span class="ml-1"> {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i> </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h6 class="text-overflow m-0"></h6>
                                    </div>

                                    <!-- item-->
                                    <a href="{!! route('profile') !!}" class="dropdown-item notify-item">
                                        <i class="fi-head"></i> <span>My Account</span>
                                    </a>

                                    <!-- item-->
                                    <a href="{{ url('change/password') }}" class="dropdown-item notify-item">
                                        <i class="fi-cog"></i> <span>Change Password</span>
                                    </a>

                                    <!-- item-->
                                    <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fi-power"></i> <span>Logout</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </div>
                            </li>

                        </ul>

                        <ul class="list-inline menu-left mb-0">
                            <li class="float-left">
                                <button class="button-menu-mobile open-left disable-btn">
                                    <i class="dripicons-menu"></i>
                                </button>
                            </li>
                            <li>
                                <div class="page-title-box">
                                    <h4 class="page-title">@yield('title')</h4>
                                    @yield('breadcrumb')
                                </div>
                            </li>

                        </ul>

                    </nav>

                </div>
                <!-- Top Bar End -->



                <!-- Start Page content -->
                <div class="content">
                  @yield('content')
                     <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    {{ \Carbon\Carbon::now()->format("Y") }} © Dipu Dey.
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



        <!-- jQuery  -->
        <script src="{{ asset('dashboard_assets') }}/assets/js/jquery.min.js"></script>
        <script src="{{ asset('dashboard_assets') }}/assets/js/popper.min.js"></script>
        <script src="{{ asset('dashboard_assets') }}/assets/js/bootstrap.min.js"></script>
        <script src="{{ asset('dashboard_assets') }}/assets/js/metisMenu.min.js"></script>
        <script src="{{ asset('dashboard_assets') }}/assets/js/waves.js"></script>
        <script src="{{ asset('dashboard_assets') }}/assets/js/jquery.slimscroll.js"></script>

        <!-- Required datatable js -->
        <script src="{{ asset('dashboard_assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{{ asset('dashboard_assets') }}/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Responsive examples -->
        <script src="{{ asset('dashboard_assets') }}/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="{{ asset('dashboard_assets') }}/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Selection table -->
        <script src="{{ asset('dashboard_assets') }}/plugins/datatables/dataTables.select.min.js"></script>

        <script src="{{ asset('dashboard_assets') }}/plugins/switchery/switchery.min.js"></script>
        <script src="{{ asset('dashboard_assets') }}/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
        <script src="{{ asset('dashboard_assets') }}/plugins/select2/js/select2.min.js" type="text/javascript"></script>
        <script src="{{ asset('dashboard_assets') }}/plugins/bootstrap-select/js/bootstrap-select.js" type="text/javascript"></script>
        <!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="../plugins/jquery-knob/excanvas.js"></script>
        <![endif]-->
        <script src="{{ asset('dashboard_assets') }}/plugins/jquery-knob/jquery.knob.js"></script>

        <!-- Dashboard Init -->
        <script src="{{ asset('dashboard_assets') }}/assets/pages/jquery.dashboard.init.js"></script>
        <!-- Bootstrap fileupload js -->
        <script src="{{ asset('dashboard_assets') }}/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
        <!-- App js -->
        <script src="{{ asset('dashboard_assets') }}/assets/js/jquery.core.js"></script>
        <script src="{{ asset('dashboard_assets') }}/assets/js/jquery.app.js"></script>
        {{-- toastr  js--}}
        <script src="{{ asset('js/toastr.min.js') }}"></script>
        {{-- Sweetalert --}}
        <script src="{{ asset('js/sweetalert.min.js') }}"></script>
        {{-- ajax --}}
        <script src="{{ asset('js/ajax.js') }}"></script>
        <script>
          @if (session('message'))
              var alert = "{{ session('type') }}";
              var message = "{{ session('message') }}";
              switch (alert) {
                case "error":
                  toastr.error(message)
                  break;
                case "warning":
                  toastr.warning(message)
                  break;
                case "info":
                  toastr.info(message)
                  break;
                default:
                  toastr.success(message)
                  break;
              }
          @endif
        </script>
        <script type="text/javascript">
            $(document).ready(function() {

                // Default Datatable
                $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf']
                });

                // Key Tables

                $('#key-table').DataTable({
                    keys: true
                });

                // Responsive Datatable
                $('#responsive-datatable').DataTable();

                // Multi Selection Datatable
                $('#selection-datatable').DataTable({
                    select: {
                        style: 'multi'
                    }
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );

        </script>
    </body>
</html>
