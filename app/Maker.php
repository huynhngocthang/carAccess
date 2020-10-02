<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maker extends Model
{
    use SoftDeletes;
    protected $table = "makers" ;

    public function ProductCar() {
        return $this->hasMany('App/productCar','id') ;
    }

    public function carModel() {
        return $this->hasMany('App/cardmodel','id') ;
    }
}
