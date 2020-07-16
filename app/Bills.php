<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Bills extends Model
{
    //
    protected $table = "bill";
    const STATUS_PENDING = 0;
    const STATUS_COMPLETE = 1;
    protected $status_order = [
        1 => [
          'name' => 'Complete',
            'class' => 'success'
        ],
        0 => [
            'name' => 'Pending',
            'class' => 'warning'
        ]
    ];
    public function getstatus(){
        return Arr::get($this->status_order, $this->status, '[N/A]');
    }
    public function bill(){
        return $this->hasMany('App\Bill_Detail', 'id_bill', 'id');
    }
    public function customer(){
        return $this->belongsTo('App\Customer', 'id_customer', 'id');
    }

}
