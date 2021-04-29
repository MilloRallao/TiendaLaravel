<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'codigo';
    
    /**
     * Get the wish associated with the article.
     */
    public function deseos(){
        return $this->belongsTo('App\Deseo');
    }
    
    /**
     * Get the carrito associated with the article.
     */
    public function carritos(){
        return $this->belongsTo('App\Carrito');
    }
    
    /**
     * Get the image associated with the article.
     */
    public function imagenes(){
        return $this->hasMany('App\Imagen', 'codigo_articulo');
    }
    
    /**
     * Get the stock associated with the article.
     */
    public function stocks(){
        return $this->belongsTo('App\Stock', 'stock');
    }
    
    /**
     * Get the family associated with the article.
     */
    public function familias(){
        return $this->belongsTo('App\Familia', 'familia', 'codigo');
    }
    
    /**
     * Get the brand associated with the article.
     */
    public function marcas(){
        return $this->belongsTo('App\Marca', 'marca', 'codigo');
    }
    
    /**
	* Check if Illuminate\Database\QueryException is Duplicate Entry Exception.
	*
	* @param  array  $attributes
	* @return \Illuminate\Database\Eloquent\Model
	*/
	protected function isDuplicateEntryException(\Exception $e){
		$errorCode  = $e->errorInfo[1];
		if ($errorCode === 1062) { // Duplicate Entry error code
			return true;
		}
		return false;
	}
    
    /**
	* Get the first record matching the attributes or create it.
	*
	* @param  array  $attributes
	* @param  array  $values
	* @return \Illuminate\Database\Eloquent\Model
	*/
	public static function firstOrCreate(array $attributes, array $values = [])
	{
		try {
			$static = (new static);
			return $static->create($attributes + $values);
		} catch (\Exception $e){
			if($static->isDuplicateEntryException($e)) {
				return $static->where($attributes)->first();
			}
		}
	}
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo', 'nombre', 'abreviatura', 'familia', 'marca', 'condicion', 'minimo', 'maximo', 'aviso', 'baja', 'tipo_iva', 'retencion', 'iva_inc', 'cost_ult1', 'fecha_ult', 'ult_fecha', 'pm_com1', 'imagen', 'caracteristicas', 'fecha_alta', 'fecha_baja', 'ubicacion', 'medidas', 'peso', 'litros', 'observacion', 'unicaja', 'desglose', 'aranceles', 'definicion2', 'subfamilia', 'internet', 'vista', 'f_pag', 'p_verde', 'p_importe', 'p_tan', 'l_color', 'margen', 'tcp', 'ven_serie', 'puntos', 'des_esc', 'tipo_art', 'modelo', 'cocina', 'stock', 'art_impuesto', 'nombre2', 'color_art', 'tipo_pvp', 'cost_escan', 'tipo_escan', 'art_canon', 'actua_colo', 'fact_arepe', 'garantia', 'alquiler', 'orden', 'c_ent', 'cn8', 'iva_lot', 'artant', 'reportetiq', 'guid', 'importar', 'dto1', 'dto2', 'dto3', 'isp'
    ];
}