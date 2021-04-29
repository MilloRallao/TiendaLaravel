<?php

namespace App\Exports;

use App\Familia;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FamiliaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Familia::orderBy('codigo', 'ASC')->get();
    }
    
    public function headings(): array
    {
        return [
            'ID',
            'Código',
            'Familia',
            'Ruta de Imagen',
        ];
    }
}
