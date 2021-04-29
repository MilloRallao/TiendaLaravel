<?php

namespace App\Imports;

use App\Articulo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ArticulosImport implements ToModel, WithHeadingRow
{
    use Importable;
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row){
        
        return new Articulo([
            'codigo'    => $row['codigo'],
            'nombre'    => $prueba['nombre'],
            'abreviatura'    => $row['abrev'],
            'familia'    => $row['familia'],
            'marca'	=> $prueba['marca'],
            'minimo'    => $row['minimo'],
            'maximo'    => $row['maximo'],
            'aviso'    => $row['aviso'],
            'baja'    => $row['baja'],
            'tipo_iva'    => $row['tipo_iva'],
            'retencion'    => $row['retencion'],
            'iva_inc'    => $row['iva_inc'],
            'cost_ult1'    => $row['cost_ult1'],
            'fecha_ult'    => $row['fecha_ult'],
            'ult_fecha'    => $row['ult_fecha'],
            'pm_com1'    => $row['pm_com1'],
            'imagen'    => $row['imagen'],
            'caracteristicas'    => $row['caracteristicas'],
            'fecha_alta'    => $row['fecha_alta'],
            'fecha_baja'    => $row['fecha_baja'],
            'ubicacion'    => $row['ubicacion'],
            'medidas'    => $row['medidas'],
            'peso'    => $row['peso'],
            'litros'    => $row['litros'],
            'observacion'    => $row['observacion'],
            'unicaja'    => $row['unicaja'],
            'desglose'    => $row['desglose'],
            'aranceles'    => $row['aranceles'],
            'definicion2'    => $row['definicion2'],
            'subfamilia'    => $row['subfamilia'],
            'internet'    => $row['internet'],
            'vista'	=> $prueba['vista'],
            'f_pag'    => $row['f_pag'],
            'p_verde'    => $row['p_verde'],
            'p_importe'    => $row['p_importe'],
            'p_tan'    => $row['p_tan'],
            'l_color'    => $row['l_color'],
            'margen'    => $row['margen'],
            'tcp'    => $row['tcp'],
            'ven_serie'    => $row['ven_serie'],
            'puntos'    => $row['puntos'],
            'des_esc'    => $row['des_esc'],
            'tipo_art'    => $row['tipo_art'],
            'modelo'    => $row['modelo'],
            'cocina'    => $row['cocina'],
            'stock'    => $row['stock'],
            'art_impuesto'    => $row['art_impuesto'],
            'nombre2'    => $row['nombre2'],
            'color_art'    => $row['color_art'],
            'tipo_pvp'    => $row['tipo_pvp'],
            'cost_escan'    => $row['cost_escan'],
            'tipo_escan'    => $row['tipo_escan'],
            'art_canon'    => $row['art_canon'],
            'actua_colo'    => $row['actua_colo'],
            'fact_arepe'    => $row['fact_arepe'],
            'fact_arepe'    => $row['fact_arepe'],
            'alquiler'    => $row['alquiler'],
            'orden'    => $row['orden'],
            'c_ent'    => $row['c_ent'],
            'cn8'    => $row['cn8'],
            'iva_lot'    => $row['iva_lot'],
            'artant'    => $row['artant'],
            'reportetiq'    => $row['reportetiq'],
            'guid'    => $row['guid'],
            'importar'    => $row['importar'],
            'dto1'    => $row['dto1'],
            'dto2'    => $row['dto2'],
            'dto3'    => $row['dto3'],
            'isp'    => $row['isp'],
        ]);    
    }
}
