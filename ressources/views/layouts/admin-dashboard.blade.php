<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/icon.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="dashboard/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>@yield('title')</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <!-- Bootstrap core CSS     -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/css/paper-dashboard.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet" />
        <!--  Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
        <link href="{{ asset('assets/css/themify-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/loading.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/loading-btn.css') }}" rel="stylesheet">
        <style>
        .spinner {
        margin: 100px auto 0;
        width: 70px;
        text-align: center;
        }
        .spinner > div {
        width: 18px;
        height: 18px;
        background-color: #333;
        border-radius: 100%;
        display: inline-block;
        -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
        animation: sk-bouncedelay 1.4s infinite ease-in-out both;
        }
        .spinner .bounce1 {
        -webkit-animation-delay: -0.32s;
        animation-delay: -0.32s;
        }
        .spinner .bounce2 {
        -webkit-animation-delay: -0.16s;
        animation-delay: -0.16s;
        }
        @-webkit-keyframes sk-bouncedelay {
        0%, 80%, 100% {
        -webkit-transform: scale(0)
        }
        40% {
        -webkit-transform: scale(1.0)
        }
        }
        @keyframes sk-bouncedelay {
        0%, 80%, 100% {
        -webkit-transform: scale(0);
        transform: scale(0);
        }
        40% {
        -webkit-transform: scale(1.0);
        transform: scale(1.0);
        }
        }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <div class="sidebar" data-background-color="white" data-active-color="danger">
                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="" class="simple-text">
                            My Account
                        </a>
                    </div>
                    <ul class="nav">
                        <li class="{{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="ti-panel"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'genre.index' ? 'active' : '' }}">
                            <a href="{{ route('genre.index') }}">
                                <i class="ti-receipt"></i>
                                <p>Genre</p>
                            </a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'series.index' ? 'active' : '' }}">
                            <a href="{{ route('series.index') }}">
                                <i class="ti-receipt"></i>
                                <p>Series</p>
                            </a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'users.index' ? 'active' : '' }}">
                            <a href="{{ route('users.index') }}">
                                <i class="ti-user"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.logout') }}">
                                <i class="ti-power-off"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-panel">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar bar1"></span>
                            <span class="icon-bar bar2"></span>
                            <span class="icon-bar bar3"></span>
                            </button>
                            <a class="navbar-brand" href="#">Dashboard</a>
                        </div>
                        <div class="collapse navbar-collapse">
                        </div>
                    </div>
                </nav>
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
        <!--   Core JS Files   -->
        <script src="{{ asset('assets/js/jquery-1.10.2.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap-checkbox-radio.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap-notify.js') }}"></script>
        <script src="{{ asset('assets/js/paper-dashboard.js') }}"></script>
        <script src="{{ asset('assets/js/demo.js') }}"></script>
        <script>
        function loadingBtn() {
        document.getElementById('loading-btn').innerHTML = '<button class="btn ld-ext-right running" disabled>Loading <div class="ld ld-ring ld-spin"></div></button>';
        return true;
        }
        </script>
    </body>
</html>