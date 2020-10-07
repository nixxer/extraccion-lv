<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    public function medios(){
        
        return $this->belongsToMany('App\Medio','Extraccions')->withPivot('cantidad','lugar','id');
    }
}
