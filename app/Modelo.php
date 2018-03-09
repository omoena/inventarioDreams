<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
     // Nombre de la tabla de la base de datos que definimos (Database table name).
  	protected $table='models';
	  /**
	    Por defecto Eloquent  asume que existe una clave primaria llamada id,
	    si este no es nuesto caso lo tenemos que indicar en la variable $primaryKey
	  */
	protected $primaryKey = 'idmodel';
	 
	  // Denimos los campos de la tabla directamente en la variable de tipo array $fillable
	protected $fillable =  ['descmodel','brand_id'];

	protected $with = ['Brands'];

	public function Brands(){
        return $this->belongsTo('App\Brand','brand_id');
    }

    public function Types(){
        $this->hasOne('App\Type');
    }

    //public $timestamps = false;
}
