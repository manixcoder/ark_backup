<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function business_category()
    {
        return $this->belongsTo('App\BusinessCategory');
    }
    public function guests(){
        return $this->belongsToMany('App\User', 'business_guest', 'business_id', 'guest_id');
    }
}
