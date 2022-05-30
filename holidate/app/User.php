<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'password', 'username', 'users_role',
    ];

    
    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this
        ->belongsToMany('App\Role');
    }

    public function hobbies(){
        return $this->belongsToMany('App\Hobbie', 'hobbie_user', 'user_id',  'hobbie_id');
    }
    public function languages(){
        return $this->belongsToMany('App\Language', 'language_user', 'user_id',  'language_id');
    }
    public function posts(){
        return $this->hasMany('App\Post');
    }
    public function business(){
        return $this->hasOne('App\Business');
    }
    public function country(){
        return $this->belongsTo('App\Country');
    }
    public function professional_category(){
        return $this->belongsTo('App\ProfessionalCategory');
    }
    public static function getNearBy($lat, $lng, $distance,
        $distanceIn = 'miles') {
        if ($distanceIn == 'km') {
            $results = User::select(['*', DB::raw('( 0.621371 * 3959 * acos( cos( radians(' . $lat . ') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(' . $lng . ') ) + sin( radians(' . $lat . ') ) * sin( radians(latitude) ) ) ) AS distance')])->havingRaw('distance < ' . $distance)->get();
        } else {
            $results = User::select(['*', DB::raw('( 3959 * acos( cos( radians(' . $lat . ') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(' . $lng . ') ) + sin( radians(' . $lat . ') ) * sin( radians(latitude) ) ) ) AS distance')])->havingRaw('distance < ' . $distance)->get();
        }
        return $results;
    }
    public function business_stay(){
        return $this->belongsToMany('App\Business', 'business_guest', 'guest_id', 'business_id');
    }
}
