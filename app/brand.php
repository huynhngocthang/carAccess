<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    protected $table = 'brands' ;

    public function Product() {
        return $this->hasMany('App\product','brand_id','id') ;
    }

}
