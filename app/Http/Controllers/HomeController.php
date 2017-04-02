<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Partida;
use App\PregPartida;
use App\Pregunta;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        return view('home');
    }
    public function juegoAleatorio()
    {
        return redirect()->action('JuegoController@aleatorio');
    }
    
}
