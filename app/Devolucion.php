<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devolucion extends Model
{
    //

    public function extraccion()
    {     
      return $this->belongsTo('App\Extraccion');     
    }
}
