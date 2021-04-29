<?php

namespace App\Imports;

use App\Marca;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MarcaImport implements ToModel, WithHeadingRow
{
    use Importable;
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row){
        
        return new Marca([
            'codigo'    => $row['codigo'],
            'marca'    => $prueba['nombre']
        ]);    
    }
}
