<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Partida;
use App\PregPartida;
use App\Pregunta;
use Illuminate\Database\QueryException;
use App\Http\Requests;
use Illuminate\Http\Request;
use Response;

class JuegoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('juego' );
    }
    public function aleatorio()
    {
        if (Auth::check())
        {
            $user = Auth::user();
            
            $id_usuario = $user->id;
            //$usuario     = DB::table('users')->get();
            
            $usuarios = User::all();
            
            //OPONENTE ALEARORIO
            do{
                $num =  rand ( 0 , (count($usuarios)-1));
            }while ($usuarios[$num]->id == $user->id);
            
            
            $datos =array();
            $datos['nombreOponente'] = $usuarios[$num]->name;
            $datos['idOponente'] = $usuarios[$num]->id;
            
            //NUEVA PARTIDA
            $partida = new Partida;
            $partida->jugador1 = $id_usuario;
            $partida->jugador2 = $usuarios[$num]->id;
            $partida->save();
            
           
            $datos['idPartida'] = $partida->id;
             
            
            //NUEVA PREGUNTAS_PARTIDA (Introduccion 1ª Pregunta)
            $preguntas = Pregunta::all(); 
            $num_Al_Preg = rand ( 0 , (count($preguntas)-1));
            $idPreg = $preguntas[$num_Al_Preg]->id; 
            
            $pPartida = new  pregPartida ();
            $pPartida->idPartida = $partida->id;
            $pPartida->idPregunta = $idPreg;
            $pPartida->save();
            
            
            //Introduccion del testo de preguntas
            $allPregPartida = pregPartida::where('id', $pPartida)->get();
            for($i = 0; $i<2; $i++)
            {
                $pregEncontrada = false;    
                $idPreg2 = -1;
                do{
                    $numPreg = rand (0 , (count($preguntas)-1));
                    
                    $idPreg2 = $preguntas[$numPreg]->id;
                    $allPregPartida = pregPartida::where('id', $pPartida)->where('idPregunta', $idPreg2)->get();
                    if(count($allPregPartida) != 0)
                    {
                        $pregEncontrada = true;
                    }               
                }while ($pregEncontrada); 
                
                
                $pPartida = new  pregPartida ();
                $pPartida->idPartida = $partida->id;    
                $pPartida->idPregunta = $idPreg2;
                $pPartida->save();
            }
            
            //Preparacion de los datos xa enviarlo al cliente
            $allPregPartidaTotal = pregPartida::where('idPartida', $partida->id)->get();
            for($y = 0; $y<count($allPregPartidaTotal); $y++){
                
                $datos['preguntas'][$y]['idPP'] = $allPregPartidaTotal[$y]->id;
                $datos['preguntas'][$y]['id'] = $allPregPartidaTotal[$y]->idPregunta;
                
                $textosPreg = Pregunta::where('id', $allPregPartidaTotal[$y]->idPregunta)->get();
                $datos['preguntas'][$y]['texto'] = $textosPreg[0]->textoPregunta;
                
                $aux[0] = $textosPreg[0]->respuestaCorrecta;
                $aux[1] = $textosPreg[0]->respuestaIncorrecta1;
                $aux[2] = $textosPreg[0]->respuestaIncorrecta2;
                $aux[3] = $textosPreg[0]->respuestaIncorrecta3;
                shuffle($aux);
               
                $datos['preguntas'][$y]['resp1'] = $aux[0];
                $datos['preguntas'][$y]['resp2'] = $aux[1];
                $datos['preguntas'][$y]['resp3'] = $aux[2];
                $datos['preguntas'][$y]['resp4'] = $aux[3];
            }
            
            return view('juego', $datos);//->with($datos)
             
        }
        //return view('home');
    }
    
    public function respuesta(Request $request){
        
         if($request->ajax()){
             $idUsuario = $request->input('idUsuario'); 
             $idOponente = $request->input('idOponente'); 
             $idPregunta = $request->input('idPregunta');
             $respuesta = $request->input('respuesta');
             $idPP = $request->input('idPP');
             
             //trim()
             $dato = [];
              
             //BUSCAMOS SI LA RESPUESTA ES CORRECTA O NO EN LA BD
             $pregunta = Pregunta::where('id', $idPregunta)->get();
             
             if(strcmp($pregunta[0]->respuestaCorrecta, $respuesta) == 0){
                 $dato["result"] = true;
             }
             else{
                 $dato["result"] = false;
             }
             
             //UPDATE EN LA TABLA PREGUNTASPARTIDA
            $PregPartida = pregPartida::where('id', $idPP)->get();
             
             $dato["numPregPartida"] = count($PregPartida);
             
            if(count($PregPartida) > 0)
            {
                if(is_null($PregPartida[0]->respJugador1)){
                    pregPartida::where('id', $idPP)
                               ->update(['respJugador1' =>  $dato["result"]]);
                    
                }
                else{
                    pregPartida::where('id', $idPP)
                               ->update(['respJugador2' =>  $dato["result"]]);
                }
            }
             
             //UPDATE EN LA TABLA DE PREGUNTAS
             $vCorrecta = $pregunta[0]->vecesCorrectas;
             $vContest = $pregunta[0]->vecesContestadas;
             
             if($dato["result"]){
                 Pregunta::where('id', $idPregunta)
                         ->update(['vecesContestadas' => ($vContest+1), 'vecesCorrectas' => ($vCorrecta+1) ]);
             }
             else{
                 Pregunta::where('id', $idPregunta)
                         ->update(['vecesContestadas' => ($vContest+1)]);
             }
             
             //COMPROBAMOS SI ES EL FINAL DEL JUEGO Y DE LA PARTIDA
             
             $Partida = Partida::where('id', $PregPartida[0]->idPartida)->get();
             
             $dato["PartidaIdJ1"] = $Partida[0]->jugador1;
             $dato["idUsuario"] = $idUsuario;
             
             //SI EL USUARIO ES EL JUGADOR1
             if($Partida[0]->jugador1 == $idUsuario){
                 
                 $quedanPreg = pregPartida::where('idPartida', $PregPartida[0]->idPartida)
                                               ->where('respJugador1', null)->get();
                 if(count($quedanPreg)<=0)
                 {
                     $dato["finJuego"] = true;
                     $dato["finPartida"] = false;
                     $dato["ganador"] = "-1";
                                                     
                 }
                 else
                 {
                     $dato["finJuego"] = false;
                     $dato["finPartida"] = false;
                     $dato["ganador"] = "-1";
                     
                 }
             }
             //SI EL USUARIO ES EL JUGADOR2
             elseif($Partida[0]->Jugador2 == $idUsuario){
                 
                  $quedanPreg = pregPartida::where('idPartida', $PregPartida[0]->idPartida)
                                               ->where('respJugador2', null)->get();
                 
                 //FIN DE JUEGO Y PARTIDA
                 if(count($quedanPreg)<=0)
                 {
                     $dato["finJuego"] = true;
                     $dato["finPartida"] = true;
                     
                     //comprobacion del las preguntas acertadas
                     $numRespJugador= pregPartida::where('idPartida', $PregPartida[0]->idPartida)->get();
                     $auxJ1 = 0;
                     $auxJ2 = 0;
                     for($i =0; $i<count($numRespJugador);$i++){
                         
                         if($numRespJugador[0]->respJugador1){
                             $auxJ1++;
                         }
                         if($numRespJugador[0]->respJugador2){
                             $auxJ2++;
                         }
                     }
                     
                     
                     $DatosJugador2 = User::where('id', $idUsuario)->get();
                     $dj2TotalPartidas= $DatosJugador2[0]->partidasTotales;
                         
                     $DatosJugador1 = User::where('id', $idOponente)->get();
                     $dj1TotalPartidas= $DatosJugador1[0]->partidasTotales;
                     
                     
                     if($auxJ1 > $auxJ2)
                     {
                         // UPDATE EN LA TABLA DE USUARIOS
                         
                         //jugador2
                         $dj2Perdidas= $DatosJugador2[0]->partidasPerdidas;
                         
                          User::where('id', $idUsuario)
                         ->update(['partidasTotales' => ($dj2TotalPartidas+1), 
                                   'partidasPerdidas' => ($dj2Perdidas+1) ]);
                         
                         //jugador1
                         $dj1Ganadas= $DatosJugador1[0]->partidasGanadas;
                         $dj1Puntuacion= $DatosJugador1[0]->puntuacion;
                         
                          User::where('id', $idOponente)
                         ->update(['partidasTotales' => ($dj1TotalPartidas+1), 
                                   'partidasGanadas' => ($dj1Ganadas+1),
                                   'puntuacion' => ($dj1Puntuacion+2)]);
                         
                        // UPDATE EN LA TABLA DE PARTIDA
                         Partida::where('id', $PregPartida[0]->idPartida)
                             ->update(['ganador' => 'Jugador1']);
                         
                         $dato["ganador"] = $DatosJugador1[0]->name;
                         
                     }
                     elseif($auxJ1 < $auxJ2)
                     {
                         // UPDATE EN LA TABLA DE USUARIOS
                         
                         //jugador2
                          $dj2Ganadas= $DatosJugador2[0]->partidasGanadas;
                          $dj2Puntuacion= $DatosJugador2[0]->puntuacion;
                         
                          User::where('id', $idUsuario)
                         ->update(['partidasTotales' => ($dj2TotalPartidas+1), 
                                   'partidasGanadas' => ($dj2Ganadas+1),
                                   'puntuacion' => ($dj2Puntuacion+2)]);
                         
                         //jugador1
                          $dj1Perdidas= $DatosJugador1[0]->partidasPerdidas;
                         
                          User::where('id', $idOponente)
                         ->update(['partidasTotales' => ($dj1TotalPartidas+1), 
                                   'partidasPerdidas' => ($dj1Perdidas+1) ]);
                         
                         // UPDATE EN LA TABLA DE PARTIDA
                         Partida::where('id', $PregPartida[0]->idPartida)
                             ->update(['ganador' => 'Jugador2']);
                         
                          $dato["ganador"] = $DatosJugador2[0]->name;
                         
                     }
                     else
                     {
                         // UPDATE EN LA TABLA DE USUARIOS
                         
                         //jugador2
                          $dj2Ganadas= $DatosJugador2[0]->partidasGanadas;
                          $dj2Puntuacion= $DatosJugador2[0]->puntuacion;
                         
                          User::where('id', $idUsuario)
                         ->update(['partidasTotales' => ($dj2TotalPartidas+1), 
                                   'partidasGanadas' => ($dj2Ganadas+1),
                                   'puntuacion' => ($dj2Puntuacion+1)]);
                         
                         //jugador1
                         $dj1Ganadas= $DatosJugador1[0]->partidasGanadas;
                         $dj1Puntuacion= $DatosJugador1[0]->puntuacion;
                         
                          User::where('id', $idOponente)
                         ->update(['partidasTotales' => ($dj1TotalPartidas+1), 
                                   'partidasGanadas' => ($dj1Ganadas+1),
                                   'puntuacion' => ($dj1Puntuacion+1)]);
                         
                         // UPDATE EN LA TABLA DE PARTIDA
                         Partida::where('id', $PregPartida[0]->idPartida)
                             ->update(['ganador' => 'Empate']);
                         
                          $dato["ganador"] = 'Empate';                       
                         
                     }
                                                     
                 }
                 else
                 {
                     $dato["finJuego"] = false;
                     $dato["finPartida"] = false;
                     $dato["ganador"] = "-1";
                 }
             }
             
             return Response::json($dato);
        }
        
    }
}