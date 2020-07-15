<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = "products";

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
