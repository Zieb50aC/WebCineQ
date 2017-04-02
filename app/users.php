<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
     //para "migrar" de la bd la tabla ciudades
     protected $table = 'users';
     //no es necesario cuando la pk se llama id
     //public $primaryKey = 'id_tipo';
     //necesario cuando la pk no es autoincrement
     //public $incrementing = true;
     //necesario cuando en las tablas no hay timespace: es decir no estan los campos created ni updated
     //public  $timestamps = false;
    
    // public function puntuacion()
    //{
        //return $this->belongsTo('App\pregunta', 'idPregunta');
    //}
     public function partida()
    {
        return $this->hasMany('App\partida'); 
    }
}