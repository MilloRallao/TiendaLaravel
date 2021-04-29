<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public $timestamps = false;
    
    /**
     * Get the article associated with the stock.
     */
    public function articulos(){
        return $this->hasMany('App\Articulo');
    }
}
