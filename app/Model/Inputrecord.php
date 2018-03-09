<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Inputrecord extends Model
{
      // Nombre de la tabla de la base de datos que definimos (Database table name).
  	protected $table ='inputrecords';
	  /**
	    Por defecto Eloquent  asume que existe una clave primaria llamada id,
	    si este no es nuesto caso lo tenemos que indicar en la variable $primaryKey
	  */
	protected $primaryKey = 'idrecordin';
	  // Denimos los campos de la tabla directamente en la variable de tipo array $fillable
	protected $fillable =  array('quantityinput', 'reasoninput', 'addresseein', 'placeinput', 'archiveinput', 'dateinput','photo','product_id','location_id','user_id','state_id','city_id');

    protected $with = ['Products','Locations','Users','States','Cities'];

	public function Products(){
        return $this->belongsTo('App\Model\Product','product_id');
    }

    public function Locations(){
        return $this->belongsTo('App\Model\Location','location_id');
    }

    public function Users(){
        return $this->belongsTo('App\Model\User','user_id');
    }

    public function States(){
        return $this->belongsTo('App\Model\State','state_id');
    }

    public function Cities(){
        return $this->belongsTo('App\Model\City','city_id');
    }
}
