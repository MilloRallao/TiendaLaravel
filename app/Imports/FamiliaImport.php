<?php

namespace App\Imports;

use App\Familia;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FamiliaImport implements ToModel, WithHeadingRow
{
    use Importable;
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row){
        
        return new Familia([
            'codigo'    => $row['codigo'],
            'familia'    => $prueba['nombre']
        ]);    
    }
}
