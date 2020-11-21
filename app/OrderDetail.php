<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public function dress(){
        return $this->belongsTo('App\Dress','dress_id');
    }

    public function order(){
        return $this->belongsTo('App\Order');
    }
}
