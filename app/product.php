<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'products' ;

   public function Brand() {
        return $this->belongsTo('App\brand','id') ;
   }

   public function carModel() {
       return $this->belongsTo('App\carmodel','carModel_id','id') ;
   }

}
