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
        
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
		<link rel="shortcut icon" href="" type="image/ico" />
		<link rel="icon" href="" type="image/ico" />

        <title>MovieQ | @yield('title')</title>


        

       
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="http://localhost/mQFrEn/movieQFrontEnd/public/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="http://localhost/mQFrEn/movieQFrontEnd/public/css/font-awesome.min.css">
    
        <link rel="stylesheet" type="text/css" href="http://localhost/mQFrEn/movieQFrontEnd/public/css/bootstrap_theme_slate.min.css">
        <!--<link rel="stylesheet" type="text/css" href="css/bootstrap-theme-X.css">-->
    
        <link rel="stylesheet" type="text/css" href="http://localhost/mQFrEn/movieQFrontEnd/public/css/propios/css_appBlade.css">
        <link rel="stylesheet" type="text/css" href="http://localhost/mQFrEn/movieQFrontEnd/public/css/propios/homeBlade.css">
        <link rel="stylesheet" type="text/css" href="http://localhost/mQFrEn/movieQFrontEnd/public/css/propios/welcomeBlade.css">
        
   
   

    
</head>
<body >
    <div class = " row ">
        <!--<div class = "col-xl-4 col-lg-4 col-md-4 col-sm-4"></div>-->
        
            @if (Auth::guest())
                @yield('titulo2')
            @else
                <div class="homePruebas titulo sombraCaja">
                    <div class="transp">
                        M<div class="letraPeq">ovie</div>Q
                    </div>
                </div>
            @endif
       
        <!--<div class = "col-xl-4 col-lg-4 col-md-4 col-sm-4"></div>-->
    </div>
    <div class="row ">
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 ">
            </br></br></br></br></br></br>
            @if (Auth::guest())  
            
                @yield('botones')
                <!--<a id = "sinLog" href="{{ url('/login') }}" class="btn btn-default btn-lg btn-block sombraCaja">Login</a>
                <a href="{{ url('/register') }}" class="btn btn-default btn-lg btn-block sombraCaja">Registrate</a>-->
            @else
                 <li class="dropdown sinPunto">
                    <a class="btn btn-default btn-lg btn-block dropdown-toggle sombraCaja" data-toggle="dropdown" href="#" aria-expanded="false">{{ Auth::user()->name }}<span class="caret"></span></a>
                    <ul class="dropdown-menu sombraCaja" style = "min-width: 100% !important;">
                        <li><a href="{{ url('/home') }}">Pagina Principal</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>
            @endif
           
        </div>
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 ">
            </br></br>
            @yield('content')
        </div>
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2"></div>
    </div>

   

    <!-- JavaScripts -->
    <script src="http://localhost/mQFrEn/movieQFrontEnd/public/js/jquery-3.1.1.min.js"></script>
    <script src="http://localhost/mQFrEn/movieQFrontEnd/public/js/bootstrap.min.js"></script>
        <script src="http://localhost/mQFrEn/movieQFrontEnd/public/js/portada.js"></script>

    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
