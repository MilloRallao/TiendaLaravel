<?php

namespace App\Exports;

use App\Articulo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ArticulosExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Articulo::orderBy('codigo', 'ASC')->get();
    }
    
    public function headings(): array
    {
        return [
            'ID',
            'codigo',
            'nombre',
            'abreviatura',
            'familia',
            'marca',
            'condicion',
            'minimo',
            'maximo',
            'aviso',
            'baja',
            'tipo_iva',
            'retencion',
            'iva_inc',
            'cost_ult1',
            'fecha_ult',
            'ult_fecha',
            'pm_com1',
            'imagen',
            'caracteristicas',
            'fecha_alta',
            'fecha_baja',
            'ubicacion',
            'medidas',
            'peso',
            'litros',
            'observacion',
            'unicaja',
            'desglose',
            'aranceles',
            'definicion2',
            'subfamilia',
            'internet',
            'vista',
            'f_pag',
            'p_verde',
            'p_importe',
            'p_tan',
            'l_color',
            'margen',
            'tcp',
            'ven_serie',
            'puntos',
            'des_esc',
            'tipo_art',
            'modelo',
            'cocina',
            'stock',
            'art_impuesto',
            'nombre2',
            'color_art',
            'tipo_pvp',
            'cost_escan',
            'tipo_escan',
            'art_canon',
            'actua_colo',
            'fact_arepe',
            'garantia',
            'alquiler',
            'orden',
            'c_ent',
            'cn8',
            'iva_lot',
            'artant',
            'reportetiq',
            'guid',
            'importar',
            'dto1',
            'dto2',
            'dto3',
            'isp'
        ];
    }
}
