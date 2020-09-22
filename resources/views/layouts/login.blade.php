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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <link href="{{asset("dist/css/style.min.css")}}" rel="stylesheet">
</head>
<style>
    #main-wrapper[data-layout=vertical][data-sidebartype=full] .page-wrapper {
        margin: 0;
    }

    @media (min-width: 768px) {
        #main-wrapper[data-layout=vertical][data-sidebartype=mini-sidebar] .page-wrapper {
            margin: 0;
        }
    }
</style>
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
    <!-- Chart JS -->
    <script src="{{asset("dist/js/pages/dashboards/dashboard1.js")}}"></script>
</body>
</html>
