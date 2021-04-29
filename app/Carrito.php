<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'usuario_id', 'articulo_id', 'unidades', 'precio_total'
    ];
    
    /**
     * Get the user associated with the wish.
     */
    public function user(){
        return $this->belongsTo('App\User', 'usuario_id');
    }
    
    /**
     * Get the article associated with the wish.
     */
    public function articulo(){
        return $this->hasMany('App\Articulo', 'id', 'articulo_id');
    }
}
