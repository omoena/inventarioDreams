<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Product extends Model
{
      // Nombre de la tabla de la base de datos que definimos (Database table name).
  	protected $table='products';
	  /**
	    Por defecto Eloquent  asume que existe una clave primaria llamada id,
	    si este no es nuesto caso lo tenemos que indicar en la variable $primaryKey
	  */
	protected $primaryKey = 'idproduct';
	 
	  // Denimos los campos de la tabla directamente en la variable de tipo array $fillable
	protected $fillable =  ['name', 'serial', 'description', 'archive', 'photo', 'detail','daterecords','state','datereturn','delivery','type_id','provider_id','user_id'];

    //public $timestamps = false;       //desactiva que guarde automatico las fechas

    protected $with = ['Types','Providers'];

	public function Types(){
       return $this->belongsTo('App\Model\Type','type_id');
    }

    public function Providers(){
        return $this->belongsTo('App\Model\Provider','provider_id');
    }

    public function Users(){
        return $this->belongsTo('App\Model\User');
    }

    public function Inputrecords(){
        return $this->hasMany('App\Model\Inputrecord');
    }

    public function Outputrecords(){
        return $this->hasMany('App\Model\Outputrecord','product_id', 'idproduct');
    }

    public function scopeAtrasado($query) {
        $now = Carbon::now();
        $now->subDays(1);
        $query->where('datereturn', '<', $now);
    }

    public function scopeOntime($query) {
        $now = Carbon::now()->SubDays(1)->endOfDay();
        $end = Carbon::now()->endOfDay();
        $query->whereBetween('datereturn', [$now, $end]);
    }
       
}
