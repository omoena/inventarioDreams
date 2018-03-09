<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
      // Nombre de la tabla de la base de datos que definimos (Database table name).
  	protected $table='cities';
	  /**
	    Por defecto Eloquent  asume que existe una clave primaria llamada id,
	    si este no es nuesto caso lo tenemos que indicar en la variable $primaryKey
	  */
	protected $primaryKey = 'idcity';
	  // Denimos los campos de la tabla directamente en la variable de tipo array $fillable
	protected $fillable =  ['desccity'];

	public function Inputrecords(){
        $this->hasOne('App\Inputrecord');
    }

    public function Outputrecords(){
        $this->hasOne('App\Outputrecord');
    }
}
