<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
     //para "migrar" de la bd la tabla ciudades
     protected $table = 'partida';
     //no es necesario cuando la pk se llama id
     //public $primaryKey = 'id_tipo';
     //necesario cuando la pk no es autoincrement
     //public $incrementing = true;
     //necesario cuando en las tablas no hay timespace: es decir no estan los campos created ni updated
     public  $timestamps = false;

    //Rel 1:N
     public function pregPartida()
    {
        return $this->hasMany('App\PreguntasPartida'); 
    }

    //Rel: N:1
     public function jugador1()
    {
        return $this->belongsTo('App\Users', 'id');
    }
     public function jugador2()
    {
        return $this->belongsTo('App\Users', 'id');
    }
}