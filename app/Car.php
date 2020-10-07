<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public function carModel() {
        return $this->belongsTo(cardmodel::class,'carModel_id','id') ;
    }
}
