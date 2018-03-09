<?php

namespace App\Model;



use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
         // Nombre de la tabla de la base de datos que definimos (Database table name).
  	protected $table='positions';
 
	  /**
	    Por defecto Eloquent  asume que existe una clave primaria llamada id,
	    si este no es nuesto caso lo tenemos que indicar en la variable $primaryKey
	  */
	protected $primaryKey = 'idposition';
	 
	  // Denimos los campos de la tabla directamente en la variable de tipo array $fillable
	protected $fillable =  ['descposition'];

	public function Users(){
        $this->hasOne('App\Model\User');
    }
}


