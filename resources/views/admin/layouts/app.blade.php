<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ trans('home.webtitle') }} </title>
    <link rel="shortcut icon" href="{{ asset('image/minilogo.png') }}" />

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('css/course.css') }}"" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <img src="{{ asset('image/logo3.png') }}" id="logo">
                <img src="{{ asset('image/minilogo.png') }}" id="minilogo">
            </div>

            <ul class="menu-nav components">
                <li class="active linav">
                    <a href="#homeSubmenu" id="aelement">
                        <div class="row">
                            <div class="col-md-3">
                                <i class="fas fa-home"></i>
                            </div>
                            <div class="col-md-9" id="titlediv">
                                {{ trans('app.dashboard') }}
                            </div>
                        </div>
                    </a>
                </li>
                <li class="linav">
                    <a href="{{ route('admin.courses.index') }}" id="aelement">
                        <div class="row">
                            <div class="col-md-3">
                                <i class="fas fa-book-open"></i>
                            </div>
                            <div class="col-md-9" id="titlediv">
                                {{ trans('app.courses') }}
                            </div>
                        </div>
                    </a>
                </li>
                <li class="linav">
                    <a href="#" id="aelement">
                        <div class="row">
                            <div class="col-md-3">
                                <i class="fas fa-pencil-alt"></i>
                            </div>
                            <div class="col-md-9" id="titlediv">
                                {{ trans('app.subjects') }}
                            </div>
                        </div>
                    </a>
                </li>
                <li class="linav">
                    <a href="#" id="aelement">
                        <div class="row">
                            <div class="col-md-3">
                                <i class="fas fa-user-friends"></i>
                            </div>
                            <div class="col-md-9" id="titlediv">
                                {{ trans('app.trainees') }}
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
            <button type="button" id="sidebarCollapse" class="btn btn-danger fixed-bottom rounded-0">
                <i class="fas fa-arrow-alt-circle-left" id="collapseicon"></i>
            </button>
        </nav>

        <div id="content">
            <nav class="navbar navbar-expand-md navbar-light">
                <div class="container-fluid">
                    {{-- <button type="button" id="sidebarCollapse" class="btn btn-outline-danger">
                        <i class="fas fa-arrow-alt-circle-left" id="collapseicon"></i>
                    </button> --}}

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ trans('auth.login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ trans('auth.register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>                                  
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        @if (Auth::user()->isSupervisor())
                                        <a class="dropdown-item" id="admin_page" href="{{ route('home') }}">
                                            {{ trans('app.user_page') }}
                                        </a>
                                        @endif
                                        <a class="dropdown-item" id="logout">
                                            {{ trans('auth.logout') }}
                                        </a>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="{{ mix('js/logout.js') }}"></script>
<script src="{{ mix('js/toggle.js') }}"></script>
</html>
