<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cardmodel extends Model
{
    use SoftDeletes ;

    protected $table = 'cardmodels' ;

    public function products() {
        return $this->hasMany(Car::class,'carModel_id','id') ;
    }

    public function maker() {
        return $this->belongsTo(Maker::class,'maker_id','id') ;
    }
}
