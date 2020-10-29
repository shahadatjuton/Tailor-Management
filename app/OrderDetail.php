<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public function dresses(){
        return $this->hasMany('App\OrderDetail');
    }
}
