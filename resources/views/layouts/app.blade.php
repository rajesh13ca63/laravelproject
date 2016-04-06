<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='http://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css' />
    <link rel='stylesheet' type='text/css' href='http://www.trirand.com/blog/jqgrid/themes/ui.jqgrid.css' />

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('fancyapps/source/jquery.fancybox.css?v=2.1.5') }}" media="screen" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ URL::asset('css/ui.jqgrid.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/custom.css') }}" />
    <!--These file are used for date formate-->
    <link rel="stylesheet" href="{{ URL::asset('css/datepicker.css') }}">
</head>
<body id="app-layout">
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            @if (Auth::guest())
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}">Home</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/about') }}">About</a></li>
                </ul>
            @else
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>
                 <ul class="nav navbar-nav">
                    <li><a href="{{ url('/display') }}">Profile</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/getupdate') }}">Edit Profile</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/griddemo') }}">AllGrid</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/roleresourceperm') }}"><b>Manage</b></a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/privilege') }}"><b>Privilege</b></a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/allusers') }}"><b>Users Role</b></a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/review') }}"><b>Review</b></a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li><a href="{{url('career')}}"><b>Career</b></a></li>
                </ul>
                 <ul class="nav navbar-nav">
                    <li><a href="{{url('searchjob')}}"><b>ProductSearch</b></a></li>
                </ul>
                
           @endif
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} 
                            <img src="image/{{ Auth::user()->image }}" width="30" 
                            height=30>
                            <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div id="main">
        @yield('content')
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Your Website 2016</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/fancyapps/source/jquery.fancybox.js"></script>
    <script src="/js/grid.locale-en.js" type="text/javascript"></script>
    <!-- Load jQuery and bootstrap datepicker scripts -->
    <script src="{{ URL::asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ URL::asset('js/manageprivilege.js') }}"></script>
    <!--Jqrid load for all user and tweets-->
    <script src="{{ URL::asset('js/gridlist.js?version=1.2') }}"></script>
    <script src="{{ URL::asset('js/jquery.jqGrid.min.js') }}"></script>
</body>
</html>
