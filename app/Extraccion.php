<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extraccion extends Model
{
    //

    public function trabajador()
    {
        return $this->belongsTo('App\Trabajador');
    }

    public function medio()
    {
        return $this->belongsTo('App\Medio');
    }

    public function devolucion()
    {
        return $this->hasMany('App\Devolucion');
    }
}
