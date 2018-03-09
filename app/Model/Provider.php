<?php
namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
      // Nombre de la tabla de la base de datos que definimos (Database table name).
  	protected $table='providers';
	  /**
	    Por defecto Eloquent  asume que existe una clave primaria llamada id,
	    si este no es nuesto caso lo tenemos que indicar en la variable $primaryKey
	  */
	protected $primaryKey = 'idprovider';
	  // Denimos los campos de la tabla directamente en la variable de tipo array $fillable
	protected $fillable =  ['businessname', 'rut', 'address', 'phone', 'daterecords', 'user_id'];

	protected $with = ['Users'];

	public function Users(){
        return $this->belongsTo('App\Model\User','user_id');
    }

    public function Products(){
        $this->hasOne('App\Product');
    }
}
