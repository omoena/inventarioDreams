<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = 'role_user';
    protected $fillable=['user_id','role_id','propiedad_id'];
    // public $timestamps = true;

    protected $with = [ 'role','user' ];

    public $timestamps = false; 
    
    function role() {
        // return $this->belongsTo('App\Models\Role\Role', 'id');
        return $this->belongsTo(Role::class);
    }
    function user() {
        // return $this->belongsTo('App\Model\User', 'id');
        return $this->belongsTo(User::class);

    }

}
