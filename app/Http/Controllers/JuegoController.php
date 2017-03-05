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
            //echo " || id_usuario = " . $id_usuario;
            
            //$usuario     = DB::table('users')->get();
            
            $usuarios = User::all();
            
            //OPONENTE ALEARORIO
            do{
                $num =  rand ( 0 , (count($usuarios)-1));
            }while ($usuarios[$num]->id == $user->id);
            
            //echo " || num Aleatorio = " . $num;
            //echo " || count(usuarios) = " . count($usuarios);
            //echo " || id jugador2 = " . $usuarios[$num]->id;
            $datos =array();
            $datos['nombreOponente'] = $usuarios[$num]->name;
            $datos['idOponente'] = $usuarios[$num]->id;
            
            $partida = new Partida;
            $partida->jugador1 = $id_usuario;
            $partida->jugador2 = $usuarios[$num]->id;
            $partida->save();
            
            //echo " || id partida = " . $partida->id;
            $datos['idPartida'] = $partida->id;
                 
            $preguntas = Pregunta::all(); 
            $num_Al_Preg = rand ( 0 , (count($preguntas)-1));
            $idPreg = $preguntas[$num_Al_Preg]->id; 
            
            $pPartida = new  pregPartida ();
            $pPartida->idPartida = $partida->id;
            $pPartida->idPregunta = $idPreg;
            $pPartida->save();
            
            
            
            $allPregPartida = pregPartida::where('id', $pPartida)->get();
            
            
            for($i = 0; $i<2;$i++)
            {
                $pregEncontrada = false;    
                $idPreg2 = -1;
                do{
                    $numPreg = rand ( 0 , (count($preguntas)-1));
                    
                    $idPreg2 = $preguntas[$numPreg]->id;
                    $allPregPartida = pregPartida::where('id', $pPartida)->where('idPregunta', $idPreg2)->get();
                    if($allPregPartida != null)
                    {
                        !$pregEncontrada = true;
                    }               
                }while (!$pregEncontrada); 
                
                
                $pPartida = new  pregPartida ();
                $pPartida->idPartida = $partida->id;    
                $pPartida->idPregunta = $idPreg2;
                $pPartida->save();
            }
            
            $allPregPartidaTotal = pregPartida::where('idPartida', $partida->id)->get();
            //echo " allPregPartidaTotal: " . count($allPregPartidaTotal);
            //echo " allPregPartidaTotalNNN: " . $allPregPartidaTotal[0];
           // echo " |||||||||||||||  datos = " . $datos['nombreOponente'] . " -idop- " . $datos['idOponente'] . " -idpar- " .  $datos['idPartida'] ;
            
            for($y = 0; $y<count($allPregPartidaTotal); $y++){
                
                $datos['preguntas'][$y]['id'] = $allPregPartidaTotal[$y]->idPregunta;
                $textosPreg = Pregunta::where('id', $allPregPartidaTotal[$y]->idPregunta)->get();
                      
                // echo " textosPreg: " . count($textosPreg);
                //echo " textosPreg: " . $textosPreg;
                
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
               // echo " -txt- " . $datos['preguntas'][$y]['texto'] . " -r1- " .  $datos['preguntas'][$y]['resp1']. " -r2- " .  $datos['preguntas'][$y]['resp2']. " -r3- " .  $datos['preguntas'][$y]['resp3']. " -r4- " .  $datos['preguntas'][$y]['resp4'];
                
                //echo "////";
            }
             //echo $datos['preguntas'][0];
            //return view('juego', ['datos' => $datos]); 
             //return view('juego');
            return view('juego', $datos);//->with($datos)
             
        }
        //return view('home');
    }
}