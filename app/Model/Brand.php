<?php

namespace App\Model;



use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
     // Nombre de la tabla de la base de datos que definimos (Database table name).
  	protected $table='brands';
	  /**
	    Por defecto Eloquent  asume que existe una clave primaria llamada id,
	    si este no es nuesto caso lo tenemos que indicar en la variable $primaryKey
	  */
	protected $primaryKey = 'idbrand';
	 
	  // Denimos los campos de la tabla directamente en la variable de tipo array $fillable
	protected $fillable =  ['descbrand'];

	 public function Modelos(){
        $this->hasOne('App\Model\Modelo');
    }

     //public $timestamps = false;
}
