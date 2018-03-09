<?php

namespace App\Model;



use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
     // Nombre de la tabla de la base de datos que definimos (Database table name).
  	protected $table='locations';
	  /**
	    Por defecto Eloquent  asume que existe una clave primaria llamada id,
	    si este no es nuesto caso lo tenemos que indicar en la variable $primaryKey
	  */
	protected $primaryKey = 'idlocation';
	  // Denimos los campos de la tabla directamente en la variable de tipo array $fillable
	protected $fillable =  ['desclocation'];

	public function Inputrecords(){
        $this->hasOne('App\Model\Inputrecord');
    }

    public function Outputrecords(){
        $this->hasMany('App\Model\Outputrecord');
    }
}
