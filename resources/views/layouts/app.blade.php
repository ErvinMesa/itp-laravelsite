<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ervin Mesa</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset("src/assets/images/favicon.png")}}">
    <link rel="canonical" href="https://www.wrappixel.com/templates/xtremeadmin/" />
    <link href="{{asset("src/assets/libs/chartist/dist/chartist.min.css")}}" rel="stylesheet">
    <link href="{{asset("dist/js/pages/chartist/chartist-init.css")}}" rel="stylesheet">
    <link href="{{asset("src/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css")}}" rel="stylesheet">
    <link href="{{asset("src/assets/libs/c3/c3.min.css")}}" rel="stylesheet">
    <link href="{{asset('css/app.css') }}" rel="stylesheet">
    <link href=<?= asset("src/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css")?> rel="stylesheet">
    
    <link href="{{asset("dist/css/style.min.css")}}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div id="main-wrapper">
            <header class="topbar">
                <nav class="navbar top-navbar navbar-expand-md navbar-dark pl-3 pr-3">
                    <div class="navbar-header">
                        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                        <a class="navbar-brand" href="{{url("/")}}">
                            ITP25533Z
                        </a>
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                        <a class="topbartoggler d-block d-md-none waves-effect waves-light mr-5" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                    </div>
                    <div class="navbar-collapse collapse" id="navbarSupportedContent">
                        <!-- ============================================================== -->
                        <!-- toggle and nav items -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav mr-auto float-left">
                                <!-- This is  -->
                            <!--<li class="nav-item"> <a
                                    class="nav-link sidebartoggler d-none d-block waves-effect waves-dark pt-4"
                                    href="javascript:void(0)"><i class="ti-menu"></i></a> </li>-->
                    </div>
                        <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <!-- Authentication Links -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark h-100" href="" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="{{asset("src/assets/images/users/1.jpg")}}" alt="user" width="30" class="profile-pic rounded-circle" />
                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right scale-up">
                                <ul class="dropdown-user list-style-none">
                                    <li>
                                        <div class="dw-user-box p-3 d-flex">
                                            <div class="u-text ml-2">
                                                <h4 class="mb-0">{{Auth::user()->name}}</h4>
                                                <p class="text-muted mb-1 font-14">{{Auth::user()->email}}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="user-list"><i class="fa fa-power-off pl-5"></i> <a class="px-3 py-2 d-inline" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                    </form>
                                </ul>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </nav>
            </header>
                <!-- ============================================================== -->
                <!-- Left Sidebar - style you can find in sidebar.scss  -->
                <!-- ============================================================== -->
                <aside class="left-sidebar">
                    <!-- Sidebar scroll-->
                    <div class="scroll-sidebar">
                        <!-- User profile -->
                        @auth
                        <div class="user-profile position-relative" style="background: url({{ asset("src/assets/images/background/user-info.jpg")}}">
                            <!-- User profile image -->
                            <div class="profile-img"> <img src="{{ asset("src/assets/images/users/profile.png")}}" alt="user" class="w-100" /> </div>
                            <!-- User profile text-->
                            <div class="profile-text pt-1"> 
                                <a href="#" class="dropdown-toggle u-dropdown w-100 text-white d-block position-relative" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">{{Auth::user()->name}}</a>
                                <div class="dropdown-menu animated flipInY"> 
                                    <a href="authentication-login1.html" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                                </div>
                            </div>
                        </div>
                    <!-- End User profile text-->
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <span class="hide-menu">Profile </span>
                                </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                <a href="{{url('/profile/'.Auth::user()->id)}}" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu">Personal Details</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="index2.html" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Educational Background </span>
                                    </a>
                                </li>
                            </ul>
                            <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i>
                                <span class="hide-menu">Apps</span></li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="/ctracing/index" aria-expanded="false"><span
                                        class="hide-menu">City/Municipality</span></a></li>
                            </li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="/barangay/index" aria-expanded="false"><span
                                    class="hide-menu">Barangay</span></a></li>
                            </li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="/map" aria-expanded="false"><span
                                    class="hide-menu">Map</span></a></li>
                            </li>
                        </ul>
                    </nav>
                    
                    @endauth
                    <!-- End Sidebar navigation -->
                </div>
                <!-- End Sidebar scroll-->
                <!-- Bottom points-->
                @auth
                <div class="sidebar-footer">
                    <!-- item-->
                    <a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
                    <!-- item-->
                    <a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                    <!-- item-->
                    <a href="" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
                </div>
                @endauth
                <!-- End Bottom points-->
            </aside>
            <!-- ============================================================== -->
            <!-- End Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <div class="page-wrapper">
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- apps -->
    <script src="{{asset("dist/js/app.min.js")}}"></script>
    <script src="{{asset("dist/js/app.init.dark.js")}}"></script>
    <script src="{{asset("dist/js/app-style-switcher.js")}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset("src/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js")}}"></script>
    <script src="{{asset("src/assets/extra-libs/sparkline/sparkline.js")}}"></script>
    <!--Wave Effects -->
    <script src="{{asset("dist/js/waves.js")}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset("dist/js/sidebarmenu.js")}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset("dist/js/custom.min.js")}}"></script>
    <!--This page JavaScript -->
    <!-- chartist chart -->
    <script src="{{asset("src/assets/libs/chartist/dist/chartist.min.js")}}"></script>
    <script src="{{asset("src/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js")}}"></script>
    <!--c3 JavaScript -->
    <script src="{{asset("src/assets/libs/d3/dist/d3.min.js")}}"></script>
    <script src="{{asset("src/assets/libs/c3/c3.min.js")}}"></script>
    <script src=<?=asset("src/assets/libs/datatables/media/js/jquery.dataTables.min.js")?>></script>
    <script src=<?=asset("dist/js/pages/datatable/custom-datatable.js")?>></script>
    <script src=<?=asset("dist/js/pages/datatable/datatable-basic.init.js")?>></script>

    <script src=<?=asset("src/assets/libs/sweetalert2/dist/sweetalert2.all.min.js")?>></script>
    <script src=<?=asset("src/assets/extra-libs/sweetalert2/sweet-alert.init.js")?>></script>
    <!-- Chart JS -->
    <script src="{{asset("dist/js/pages/dashboards/dashboard1.js")}}"></script>
</body>
</html>
