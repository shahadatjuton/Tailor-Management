<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }
    public function categories(){
        return $this->hasMany('App\Category');
    }
    public function dresses(){
        return $this->hasMany('App\Dress','created_by');
    }
    public function carts(){
        return $this->hasMany('App\Model\Cart');
    }
    public function userInfo(){
        return $this->belongsTo('App\UserInfo');
    }
    public function userInfos(){
        return $this->hasMany('App\UserInfo','user_id');
    }
    public function orders(){
        return $this->hasMany('App\Order');
    }
}
