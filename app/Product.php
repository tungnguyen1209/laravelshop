<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Product extends Model
{
    //
    protected $table = "products";
    const STATUS_PRIVATE = 0;
    const STATUS_PUBLIC = 1;
    protected $status_pro = [
        1 => [
            'name' => 'Public',
            'class' => 'success'
        ],
        0 => [
            'name' => 'Private',
            'class' => 'danger'
        ]
    ];
    public function getstatus(){
        return Arr::get($this->status_pro, $this->status, '[N/A]');
    }
    public  function tbl_feature(){
        return $this->belongsTo('App\tbl_feature', 'new', 'id');
    }
    public  function bill_detail(){
        return $this->hasMany('App\bill_detail', 'id_product', 'id');
    }
    public function type_products(){
        return $this->belongsTo(ProductType::class, 'id_type');
    }
}
