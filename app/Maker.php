<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maker extends Model
{
    use SoftDeletes;
    protected $table = "makers" ;

    public function carModel() {
        return $this->hasMany(cardmodel::class,'maker_id','id') ;
    }
}
