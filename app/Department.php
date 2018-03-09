<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
     // Nombre de la tabla de la base de datos que definimos (Database table name).
  	protected $table='departments';
	  /**
	    Por defecto Eloquent  asume que existe una clave primaria llamada id,
	    si este no es nuesto caso lo tenemos que indicar en la variable $primaryKey
	  */
	protected $primaryKey = 'iddepartment';
	 
	  // Denimos los campos de la tabla directamente en la variable de tipo array $fillable
	protected $fillable =  ['descdepartment'];

	public function Users(){
        $this->hasOne('App\User');
    }
}
