<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
    protected $table = "bill";
    public function bill(){
        return $this->hasMany('App\Bill_Detail', 'id_bill', 'id');
    }
    public function customer(){
        return $this->belongsTo('App\Customer', 'id_customer', 'id');
    }
}
