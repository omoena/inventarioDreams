<?php

namespace App\Model;



use Illuminate\Database\Eloquent\Model;

class outputrecord extends Model
{
      // Nombre de la tabla de la base de datos que definimos (Database table name).
  	protected $table='outputrecords';
	  /**
	    Por defecto Eloquent  asume que existe una clave primaria llamada id,
	    si este no es nuesto caso lo tenemos que indicar en la variable $primaryKey
	  */
	protected $primaryKey = 'idrecordout';
	  // Denimos los campos de la tabla directamente en la variable de tipo array $fillable
	protected $fillable =  array('quantityoutput', 'reasonoutput', 'addresseeout', 'archiveoutput', 'dateoutput','dateend','photo','product_id','location_id','user_id','state_id','city_id','areapro_id','entity_id','group_id');

    protected $with = ['Products','Locations','Users','States','Cities','Areaproperties','Entities','Groups'];

	public function Products(){
        return $this->belongsTo('App\Model\Product','product_id');
    }

    public function Users(){
        return $this->belongsTo('App\Model\User','user_id');
    }

    public function Areaproperties(){
        return $this->belongsTo('App\Model\Areaproperty','areapro_id');
    }

    public function Entities(){
        return $this->belongsTo('App\Model\Entity','entity_id');
    }

    public function States(){
        return $this->belongsTo('App\Model\State','state_id');
    }

    public function Groups(){
        return $this->belongsTo('App\Model\Group','group_id');
    }

    public function Cities(){
        return $this->belongsTo('App\Model\City','city_id');
    }

    public function Locations(){
        return $this->belongsTo('App\Model\Location','location_id');
    }

}
