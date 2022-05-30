<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';
    public $timestamps = true;

    protected $fillable = array('id','image', 'heading', 'user_id', 'date', 'fb_link', 'tw_link', 'lkd_link', 'inst_link', 'description',  'created_at', 'updated_at');

}
