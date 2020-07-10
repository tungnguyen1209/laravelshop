<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = "products";
    public  function product_type(){
        return $this->belongsTo('App\product_type', 'id_type', 'id');
    }
    public  function tbl_feature(){
        return $this->belongsTo('App\tbl_feature', 'new', 'id');
    }
    public  function bill_detail(){
        return $this->hasMany('App\bill_detail', 'id_product', 'id');
    }
}
