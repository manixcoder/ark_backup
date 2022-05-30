<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


use Tymon\JWTAuth\Contracts\JWTSubject;

class Track extends Model 
{
    protected $table = 'track';
    public $timestamps = false;

    protected $fillable = array('id','phone_number','ipin','name','profile_pic', 'security_code'
    );

   

    
}
