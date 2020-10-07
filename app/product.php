<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function brand() {
        return $this->hasMany(brand::class,'brand_id','id') ;
    }

    public function cars() {    
        return $this->belongsToMany(Car::class,'car_product','product_id','car_id') ;
    }
}
