<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    protected $table = 'permission_role';
    protected $fillable=['permission_id','role_id'];
    public $timestamps = true;
    protected $with = [ 'permission' ];


    function permission() {
        // return $this->belongsTo('App\Models\Propiedad', 'id');
        return $this->belongsTo(Permission::class);
    }
}
