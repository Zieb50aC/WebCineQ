@extends('layouts.app')

@section('title')
    Bienvenida
@endsection

@section('titulo2')
   <div style="height: 50px;"></div>
@endsection


@section('content')

<div class= "pregunta">C<div class="preguntaPeque">rees </div>q<div class="preguntaPeque">ue </div>s<div class="preguntaPeque">abes </div>M<div class="preguntaPeque">ucho </div>d<div class="preguntaPeque">e </div>
c<div class="preguntaPeque">ine </div>??</div>

<!--<img id="welcomeLogo" src="http://localhost/mQFrEn/movieQFrontEnd/public/img/logoSinfondo.png">-->
<div class="row">
    <div class="col-md-6">
        <img id="welcomeLogo" src="http://localhost/mQFrEn/movieQFrontEnd/public/img/logoSinfondo.png">
    </div>
     <div class="col-md-6">
         <p class="welcomeP">ENTRA Y AVERÍGUALO</p>
         <a id = "sinLog" href="{{ url('/login') }}" class="btn btn-default btn-lg btn-block sombraCaja">Login</a>
         <a href="{{ url('/register') }}" class="btn btn-default btn-lg btn-block sombraCaja">Registrate</a>
         
    </div>
</div>
@endsection
