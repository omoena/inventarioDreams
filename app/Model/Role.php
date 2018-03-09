<?php

namespace App\Model;



use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
     protected $fillable=['name','display_name','description'];
    public $timestamps = true;

}
