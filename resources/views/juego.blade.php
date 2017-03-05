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
                                                <input type="radio" name="pregunta{{$i}}" id="{{$preguntas[$i]['resp3']}}" value="option1">
                                                <label for="{{$preguntas[$i]['resp3']}}">{{$preguntas[$i]['resp3']}}</label>
                                                <br>
                                                <input type="radio" name="pregunta{{$i}}" id="{{$preguntas[$i]['resp4']}}" value="option2">
                                                <label for="{{$preguntas[$i]['resp4']}}">{{$preguntas[$i]['resp4']}}</label>
                                            </div>
                                          </div>
                                        </div>
                                        
                                    </div>
                                    @endfor
                                    <a id="{{$i}}" href="#" class="btn btn-primary btn-xs sigP">Siguiente pregunta</a>
                                </div>
                            <!-- 

<div class="form-group radio">
                                      <label class="col-lg-2 control-label"></label>
                                      <div class="col-lg-10">
                                        <div class="radio">
                                          <label>
                                            <input type="radio" name="optionsRadios" id="{{$preguntas[0]['resp1']}}" value="option1">
                                           {{$preguntas[0]['resp1']}}
                                          </label>
                                        </div>
                                        <div class="radio">
                                          <label>
                                            <input type="radio" name="optionsRadios" id="{{$preguntas[0]['resp2']}}" value="option2">
                                            {{$preguntas[0]['resp2']}}
                                          </label>
                                        </div>
                                          <div class="radio">
                                          <label>
                                            <input type="radio" name="optionsRadios" id="{{$preguntas[0]['resp3']}}" value="option1">
                                           {{$preguntas[0]['resp3']}}
                                          </label>
                                        </div>
                                        <div class="radio">
                                          <label>
                                            <input type="radio" name="optionsRadios" id="{{$preguntas[0]['resp4']}}" value="option2">
                                            {{$preguntas[0]['resp4']}}
                                          </label>
                                        </div>
                                      </div>
                                    </div>
                            -->
                            
                            
                            
                           <div class="form-group">  
                                <button type="submit" class="btn btn-default btn-lg btn-block" style="font-family: fantasy; font-size: x-large;">
                                    Aceptar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
