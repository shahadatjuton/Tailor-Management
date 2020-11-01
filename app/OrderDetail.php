<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public function dress(){
        return $this->belongsTo('App\Dress');
    }

    public function order(){
        return $this->belongsTo('App\Order');
    }
}
