<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medio extends Model
{
    //
    public function trabajadores(){
        
        return $this->belongsToMany('App\Trabajador','Extraccions','medio_id','trabajador_id');        
    }
}
