<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    // Nombre de la tabla de la base de datos que definimos (Database table name).
  	protected $table='types';
  	/**
    	Por defecto Eloquent  asume que existe una clave primaria llamada id,
    	si este no es nuesto caso lo tenemos que indicar en la variable $primaryKey
  	*/
 	  protected $primaryKey = 'idtype';
  	// Denimos los campos de la tabla directamente en la variable de tipo array $fillable
  	protected $fillable =  ['desctype', 'model_id'];
    protected $with = ['Modelos'];

  	 public function Modelos(){
        return $this->belongsTo('App\Modelo','model_id');
    }

     public function Products(){
        $this->hasOne('App\Product');
    }

    //public $timestamps = false;
}
