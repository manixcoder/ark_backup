<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
    public function businesses()
    {
        return $this->hasMany('App\Business');
    }
}
