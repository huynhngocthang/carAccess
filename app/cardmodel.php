<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cardmodel extends Model
{
    use SoftDeletes ;

    protected $table = 'cardmodels' ;

    public function Product() {
        return $this->hasMany('App\product','id') ;
    }

    public function ProductCar() {
        return $this->hasMany('App\productCar','id') ;
    }

    public function Maker() {
        return $this->belongsTo('App/Maker','maker_id','id') ;
    }
}
