<?php

namespace App\Http\Controllers;

use App\pregunta;
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
       $pregunta = \App\pregunta::find(1);
        echo $pregunta->textoPregunta;
        return view('preguntas')->with($pregunta);
    }
}