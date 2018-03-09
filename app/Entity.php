<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
     // Nombre de la tabla de la base de datos que definimos (Database table name).
  	protected $table='entities';
	  /**
	    Por defecto Eloquent  asume que existe una clave primaria llamada id,
	    si este no es nuesto caso lo tenemos que indicar en la variable $primaryKey
	  */
	protected $primaryKey = 'identity';
	  // Denimos los campos de la tabla directamente en la variable de tipo array $fillable
	protected $fillable =  ['descentity'];

	public function Outputrecords(){
        $this->hasOne('App\Outputrecord');
    }
}
