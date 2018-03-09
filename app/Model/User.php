<?php

namespace App\Model;



use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Datebase\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;


class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','fullname','email','blockade', 'password','position_id','department_id'
    ];

    protected $with = ['Departments','Positions'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Positions(){
        return $this->belongsTo('App\Model\Position','position_id');
    }

    public function Departments(){
         return $this->belongsTo('App\Model\Department','department_id');
    }

    public function Providers(){
        $this->hasMany('App\Model\Provider');
    }

    public function Products(){
        $this->hasMany('App\Model\Product');
    }

    public function Inputrecords(){
        $this->hasMany('App\Model\Inputrecord');
    }

    public function Outputrecords(){
        $this->hasMany('App\Model\Outputrecord');
    }

    public function RoleUser(){
        $this->hasOne('App\Model\RoleUser');
    }
}
