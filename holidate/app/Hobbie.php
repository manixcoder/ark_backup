<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobbie extends Model
{
    public function users(){
        return $this->belongsToMany('App\User', 'hobbie_user', 'hobbie_id', 'user_id');
    }
}
