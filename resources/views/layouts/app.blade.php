<!DOCTYPE html>
<html lang="en">
<head>
    
    
    <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="CineQ Team">
		<meta name="designer" content="CineQ Team">
		<meta name="Description" content="Juego de Preguntas de Cine">
		<meta name="Keywords" content="">
		<meta name="application-name" content="CineQ ">
		<meta name="msapplication-TileColor" content="#ffffff">

		<link rel="shortcut icon" href="" type="image/ico" />
		<link rel="icon" href="" type="image/ico" />

        <title>CineQ | @yield('title')</title>


        

       
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap_theme_slate.min.css">
        <link rel="stylesheet" type="text/css" href="css/propios/css_appBlade.css">
        <link rel="stylesheet" type="text/css" href="css/propios/homeBlade.css">
    <link rel="stylesheet" type="text/css" href="css/propios/welcomeBlade.css">
        <!--<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">-->
   
   

    
</head>
<body >
    <!--<nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

               
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                
                <a class="navbar-brand" href="{{ url('/') }}">
                    Laravel
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>

                
                <ul class="nav navbar-nav navbar-right">
                  
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>-->
    <div class = " row cabecera">
        <div class = "col-xl-4 col-lg-4 col-md-4 col-sm-4"></div>
        <div class=" col-xl-4 col-lg-4 col-md-4 col-sm-4 titulo sombraCaja">
            <div class="transp">
                C<div class="letraPeq">ine</div>Q
            </div>
        </div>
        <div class = "col-xl-4 col-lg-4 col-md-4 col-sm-4"></div>
    </div>
    <div class="row ">
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 ">
            @if (Auth::guest())   
                <a href="{{ url('/login') }}" class="btn btn-default btn-lg btn-block sombraCaja">Login</a>
                <a href="{{ url('/register') }}" class="btn btn-default btn-lg btn-block sombraCaja">Registrate</a>
            @else
                 <li class="dropdown">
                    <a class="btn btn-default btn-lg btn-block dropdown-toggle sombraCaja" data-toggle="dropdown" href="#" aria-expanded="false">{{ Auth::user()->name }}<span class="caret"></span></a>
                    <ul class="dropdown-menu sombraCaja" style = "min-width: 100% !important;">
                        <li><a href="#">Action</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>
            @endif
        </div>
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 ">
            @yield('content')
        </div>
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2"></div>
    </div>

   

    <!-- JavaScripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
