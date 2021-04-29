<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'codigo', 'marca', 'ruta_imagen'
    ];
    
    /**
     * Get the article associated with the brand.
     */
    public function articulos(){
        return $this->hasMany('App\Articulo', 'codigo', 'marca');
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
}