<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


use Tymon\JWTAuth\Contracts\JWTSubject;

class Introduction extends Model 
{
    protected $table = 'introduction';
    public $timestamps = false;

    protected $fillable = array('id','Value' );

   

    
}
