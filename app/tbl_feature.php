<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_feature extends Model
{
    //
    protected $table = 'tbl_feature';
    public function product(){
        return $this->hasMany('App\Product','new', 'id');
    }
}
