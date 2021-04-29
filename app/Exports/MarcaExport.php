<?php

namespace App\Exports;

use App\Marca;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MarcaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Marca::orderBy('codigo', 'ASC')->get();
    }
    
    public function headings(): array
    {
        return [
            'ID',
            'Código',
            'Marca',
            'Ruta de Imagen',
        ];
    }
}
