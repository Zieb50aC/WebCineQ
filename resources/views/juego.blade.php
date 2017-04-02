@extends('layouts.app')

@section('title')
    Inicio
@endsection

@section('content')

<div class="">
        <div class="row">
            <div class="col-md-12">
                <div class="transp homeBorde sombraCaja" >
                    <div class="panel-heading text-center homePruebas preguntaPeque">Oponente encontrado:&nbsp; {{$nombreOponente}}
                     
                    </div>

                    <div class="panel-body">
                        </br></br>
                        <form role="form" class="form-horizontal formulario" method="GET" action="{{ url('/home/o') }}" >
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                          
                                <div id="preguntas">
                                    @for ($i = 0; $i < count($preguntas); $i++)
                                    <!--if(!empty($preguntas[$i]['texto']))-->
                                    <div id="preg{{$i}}">
                                        <p class=" homeSubtitulo"> {{$preguntas[$i]['texto']}} </p><!-- juegoTextoPregunta -->
                                        <div class="form-group ">
                                          <label class="col-lg-2 control-label"></label>
                                          <div class="col-lg-10">
                                            <div class="radio">
                                                <input type="radio" name="pregunta{{$i}}" id="{{$preguntas[$i]['resp1']}}" value="option1">
                                                <label for="{{$preguntas[$i]['resp1']}}">{{$preguntas[$i]['resp1']}}</label>
                                                <br>
                                                <input type="radio" name="pregunta{{$i}}" id="{{$preguntas[$i]['resp2']}}" value="option2">
                                                <label for="{{$preguntas[$i]['resp2']}}">{{$preguntas[$i]['resp2']}}</label>
                                                <br>
                                                <input type="radio" name="pregunta{{$i}}" id="{{$preguntas[$i]['resp3']}}" value="option3">
                                                <label for="{{$preguntas[$i]['resp3']}}">{{$preguntas[$i]['resp3']}}</label>
                                                <br>
                                                <input type="radio" name="pregunta{{$i}}" id="{{$preguntas[$i]['resp4']}}" value="option4">
                                                <label for="{{$preguntas[$i]['resp4']}}">{{$preguntas[$i]['resp4']}}</label>
                                            </div>
                                          </div>
                                        </div>
                                        <button ur="{{ url('/juego/respuesta')}}" id="{{$i}}" type="button" class="btn btn-primary btn-xs sigP"  onClick="enviaPregunta({{$i}},{{$preguntas[$i]['id']}},{{$preguntas[$i]['idPP']}}, {{ Auth::user()->id }}, {{$idOponente}})">Siguiente pregunta</button>
                                        
                                    </div>
                                    <div class="modal fade" id="modalKo{{$i}}" role="dialog">
                                        <div class="modal-dialog juegoFondoModal">
                                            <div class="modal-body juegoContornoKo">
                                              <p class="text-center preguntaPequeRed">Ohh No has acertado...</p>
                                                <img style="width:250px; height:250px;" class="homePruebas" src = "../../public/img/emoFalloTrans.png">
                                                </br>
                                                <div class="preguntaPequePeq">Vota la pregunta!</div>
                                                <div class="estrellas homePruebas">
                                                    <div class="ec-stars-wrapper" puntuacion = "2">
                                                        <a vota="1" title="Votar con 1 estrellas">&#9733;</a>
                                                        <a vota="2" title="Votar con 2 estrellas">&#9733;</a>
                                                        <a vota="3" title="Votar con 3 estrellas">&#9733;</a>
                                                        <a vota="4" title="Votar con 4 estrellas">&#9733;</a>
                                                        <a vota="5" title="Votar con 5 estrellas">&#9733;</a>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-default pull-right" data-dismiss="modal"  onclick="next({{$i}})" >Siguiente pregunta</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="modalOk{{$i}}" role="dialog">
                                        <div class="modal-dialog juegoFondoModal">
                                            <div class="modal-body juegoContornoOk">
                                              <p class="text-center preguntaPequeGreen">HAS ACERTADO!!</p>
                                                <img style="width:250px; height:250px;" class="homePruebas" src = "../../public/img/emoAcepTrans.png">
                                                 <div class="preguntaPequePeq">Vota la pregunta!</div>
                                                <div class="estrellas homePruebas">
                                                    <div class="ec-stars-wrapper" puntuacion = "2">
                                                        <a vota="1" title="Votar con 1 estrellas">&#9733;</a>
                                                        <a vota="2" title="Votar con 2 estrellas">&#9733;</a>
                                                        <a vota="3" title="Votar con 3 estrellas">&#9733;</a>
                                                        <a vota="4" title="Votar con 4 estrellas">&#9733;</a>
                                                        <a vota="5" title="Votar con 5 estrellas">&#9733;</a>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-default pull-right" data-dismiss="modal" onclick="next({{$i}})">Siguiente pregunta</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endfor
                                </div>
  
                            
                           <div id="fin" class="form-group">  
                                <button  type="submit" class="btn btn-default btn-lg btn-block" style="font-family: fantasy; font-size: x-large;">
                                   >>
                                </button>
                            </div>
                        </form>
                
                
                        <div class="modal fade" id="finJuego" role="dialog">
                            <div class="modal-dialog juegoFondoModal">
                                <div class="modal-body juegoContornoFin">
                                    <!--<form role="form" class="form-horizontal formulario" method="GET" action="{{ url('/home') }}" >
                                        {!! csrf_field() !!}-->
                                        <p class="text-center preguntaPequeFin">Fin de tu turno ...</p>
                                        <img style="width:200px; height:200px;" class="homePruebas" src = "../../public/img/wait2.png">
                                        </br>
                                        <!--<div class="form-group">-->  
                                            <a class="btn btn-default pull-right" href="{{ url('/home') }}">Regresar a la página principal</a>
                                        <!--</div>-->
                                    </form>
                                </div>
                            </div>
                        </div>
                          
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
