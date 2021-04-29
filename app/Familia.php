<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'codigo', 'familia', 'ruta_imagen'
    ];
    
    /**
     * Get the article associated with the stock.
     */
    public function articulos(){
        return $this->hasMany('App\Articulo', 'codigo', 'familia');
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
