<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productCar extends Model
{
    protected $table = 'product_cars' ;

    public function Maker() {
        return $this->belongsTo('App/Make','maker_id','id') ;
    } 

    public function CarModel() {
        return $this->belongsTo('App/carmodel','carModel_id','id') ;
    }


}
