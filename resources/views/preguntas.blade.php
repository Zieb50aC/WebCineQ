@extends('layouts.app')

@section('title')
    Inicio
@endsection

@section('content')
    <div class="container ">
        <div class="row ">
            <div class="col-md-10 ">
                
                <div class="preguntas">
                    <h1>Pregunta del juego</h1>
                        <div class= "respuestas">
                            <div class="radio">
                              <label><input type="radio" name="optradio">Respuesta 1</label>
                            </div>
                            <div class="radio">
                              <label><input type="radio" name="optradio">Respuesta 2</label>
                            </div>
                            <div class="radio">
                              <label><input type="radio" name="optradio" >Respuesta 3</label>
                            </div>
                            <div class="radio">
                              <label><input type="radio" name="optradio" >Respuesta 4</label>
                            </div>
                                <br>
                        </div>
                    <a href="#" class="btn btn-default">Validar</a>                      
                        
                </div>
            </div>
        </div>
    </div>
@endsection
