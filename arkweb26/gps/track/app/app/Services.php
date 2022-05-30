<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


use Tymon\JWTAuth\Contracts\JWTSubject;

class Services extends Model 
{
    protected $table = 'blog';
    public $timestamps = false;

    protected $fillable = array('id','name','logo'
    );

   

    
}
