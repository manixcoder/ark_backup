<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


use Tymon\JWTAuth\Contracts\JWTSubject;
class SampleWork extends Model 
{
    protected $table = 'sampleworks';
    public $timestamps = false;

    protected $fillable = array('id','title','description','caption','photo1','photo2','photo3','photo4'
    );

   

    
}
