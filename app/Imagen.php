<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    public $timestamps = false;
    
    protected $table = 'imagenes';
    
    protected $fillable = [
        'codigo_articulo',
        'ruta_imagen',
        'ruta_imagen_thumbnail',
        'ruta_imagen_large'
    ];
    
    /**
     * Get the article associated with the image.
     */
    public function articulo(){
        return $this->belongsTo('App\Articulo');
    }
}
