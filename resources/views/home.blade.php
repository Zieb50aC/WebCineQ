@extends('layouts.app')

@section('title')
    Menú Principal
@endsection


@section('content')
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <div class="transp homeBorde sombraCaja" >
                    <div class="panel-heading text-center homePruebas preguntaPeque">Bienvenido a MovieQ {{ Auth::user()->name }}!</div>

                    <div class="panel-body">
                        </br></br>
                        <p class="homeSubtitulo"><i class="fa fa-hourglass-half" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Desafios Pendientes</p>
                        </br>
                        <table class="table  homeTabla">
                            <tbody>
                                
                                <tr class=" ">
                                    <td>
                                        <i class="fa fa-user-circle-o" aria-hidden="true" style="color: #600000 !important;"></i>
                                    </td>
                                    <td>Cras justo odio</td>
                                    <td>
                                        <a href="#" class="homeBtnAcceptar">Aceptar Desafio</a>
                                    </td>
                                    <td>
                                        <a href="#" class="homeBtnRechazar">Rechazar Desafio</a>
                                    </td>
                                </tr>
                                <tr class=" homebordeTablaBttom">
                                    <td>
                                        <i class="fa fa-user-circle-o " aria-hidden="true" style="color: #600000 !important;"></i>
                                    </td>
                                    <td>Dapibus ac facilisis in</td>
                                    <td>
                                        <a href="#" class="homeBtnAcceptar">Aceptar Desafio</a>
                                    </td>
                                    <td>
                                        <a href="#" class="homeBtnRechazar">Rechazar Desafio</a>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table> 
                        </br>
                        <p class="homeSubtitulo"><i class="fa fa-play" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Nuevo Juego</p>
                        </br>
                        <form role="form" class="form-horizontal" method="GET" action="{{ url('/home/juegoAleatorio') }}" >
                            <!--<input type="hidden" name="_token" value="{!! csrf_token() !!}">-->
                            {!! csrf_field() !!}
                            <div class="form-group">  
                                <button type="submit" class="btn btn-default btn-lg btn-block" style="font-family: fantasy; font-size: x-large;">
                                    Jugador Aleatorio
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
