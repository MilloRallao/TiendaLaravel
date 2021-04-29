<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deseo extends Model
{
    public $timestamps = false;
    
    /**
     * Get the user associated with the wish.
     */
    public function user(){
        return $this->belongsTo('App\User', 'id_usuario');
    }
    
    /**
     * Get the article associated with the wish.
     */
    public function articulo(){
        return $this->hasMany('App\Articulo', 'id', 'id_articulo');
    }
}
