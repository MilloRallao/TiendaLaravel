<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Articulo;
use App\Marca;
use App\Familia;
use App\Condicion;
use App\Carrito;
use Auth;
use App\Exports\ArticulosExport;
use App\Imports\ArticulosImport;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_inicio(){
        $novedades = Articulo::where('condicion', '2')->orderBy('codigo', 'ASC')->get();
        $ofertas = Articulo::where('condicion', '1')->orderBy('codigo', 'ASC')->take(6)->get();
        $outlets = Articulo::where('condicion', '3')->orderBy('codigo', 'ASC')->take(6)->get();
        $marcas = Marca::all();
        $familias = Familia::all();
        $carritos = Carrito::where('usuario_id', Auth::id())->get();
        $carritos->toArray();
        return view('user.inicio', compact('novedades', 'ofertas', 'outlets', 'marcas', 'familias', 'carritos'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $articulos = Articulo::orderBy('codigo', 'ASC')->get();
        return view('admin.articulos', compact('articulos'));
    }
    
    /**
     * Update resources on-the-fly.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_general(Request $request){
        $param['codigo'] = $request->code;
        $param['nombre'] = $request->name;
        $param['familia'] = $request->family;
        $param['condicion'] = $request->condicion;
        $param['marca'] = $request->marca;
        $param['modelo'] = $request->model;
        $param['stock'] = $request->stock;
        $param['fecha_alta'] = $request->f_alta;
        $param['fecha_baja'] = $request->f_baja;
        $param['caracteristicas'] = $request->caract;
        $param['tipo_iva'] = $request->iva;
        $param['garantia'] = $request->garantia;
        
        $articulo = Articulo::findOrFail($request->code);
        
        $result = $articulo->update($param);
        
        return response()->json($result);
    }
    
    /**
     * Update the specified resource on the fly.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_name(Request $request){
        $param['nombre'] = $request->name;
        $articulo = Articulo::findOrFail($request->code);
        $result = $articulo->update($param);
        return response()->json($result);
    }
    /**
     * Update the specified resource on the fly.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_family(Request $request){
        $param['familia'] = $request->family;
        $articulo = Articulo::findOrFail($request->code);
        $result = $articulo->update($param);
        return response()->json($result);
    }
    /**
     * Update the specified resource on the fly.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_condicion(Request $request){
        $param['condicion'] = $request->condicion;
        $articulo = Articulo::findOrFail($request->code);
        $result = $articulo->update($param);
        dd(response()->json($result));
        return response()->json($result);
    }
    /**
     * Update the specified resource on the fly.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_marca(Request $request){
        $param['marca'] = $request->marca;
        $articulo = Articulo::findOrFail($request->code);
        $result = $articulo->update($param);
        return response()->json($result);
    }
    /**
     * Update the specified resource on the fly.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_caract(Request $request){
        $param['caracteristicas'] = $request->caracteristicas;
        $articulo = Articulo::findOrFail($request->code);
        $result = $articulo->update($param);
        return response()->json($result);
    }
    /**
     * Update the specified resource on the fly.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_model(Request $request){
        $param['modelo'] = $request->model;
        $articulo = Articulo::findOrFail($request->code);
        $result = $articulo->update($param);
        return response()->json($result);
    }
    /**
     * Update the specified resource on the fly.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_stock(Request $request){
        $param['stock'] = $request->stock;
        $articulo = Articulo::findOrFail($request->code);
        $result = $articulo->update($param);
        return response()->json($result);
    }
    /**
     * Update the specified resource on the fly.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_f_alta(Request $request){
        $param['fecha_alta'] = $request->f_alta;
        $articulo = Articulo::findOrFail($request->code);
        $result = $articulo->update($param);
        return response()->json($result);
    }
    /**
     * Update the specified resource on the fly.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_f_baja(Request $request){
        $param['fecha_baja'] = $request->f_baja;
        $articulo = Articulo::findOrFail($request->code);
        $result = $articulo->update($param);
        return response()->json($result);
    }
    /**
     * Update the specified resource on the fly.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_iva(Request $request){
        $param['tipo_iva'] = $request->iva;
        $articulo = Articulo::findOrFail($request->code);
        $result = $articulo->update($param);
        return response()->json($result);
    }
    
    /**
     * Delete the specified resource on the fly.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete_modal(Request $request){
        for($i = 1; $i <= count($request->all()); $i++){
            $code = "code_".$i;
            $articulo = Articulo::findOrFail($request->$code);
            $result = $articulo->delete();
        }
        return response()->json($result);
    }
    
    /**
    * Exportar tabla artículos
    * @return \Illuminate\Support\Collection
    */
    public function export(){
        return Excel::download(new ArticulosExport, 'articulos.xlsx');
    }
    
    /**
    * Importar tabla artículos
    * @return response
    */
    public function import(Request $request){
        $this->validate($request, [
            'input42' => 'required'
        ]);
        
        $articulos = Excel::toCollection(new ArticulosImport, $request->file('input42')[0]);
        
        if($articulos[0]){
            foreach($articulos[0] as $articulo){
                //Comprobar si hay valores nuevos que insertar, si no, actualizar
                Articulo::firstOrCreate([
                    'nombre'    => $articulo['nombre'],
                    'abreviatura'    => $articulo['abrev'],
                    'familia'    => $articulo['familia'],
                    'marca'	=> $articulo['marca'],
                    'minimo'    => $articulo['minimo'],
                    'maximo'    => $articulo['maximo'],
                    'aviso'    => $articulo['aviso'],
                    'baja'    => $articulo['baja'],
                    'tipo_iva'    => $articulo['tipo_iva'],
                    'retencion'    => $articulo['retencion'],
                    'iva_inc'    => $articulo['iva_inc'],
                    'cost_ult1'    => $articulo['cost_ult1'],
                    'fecha_ult'    => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($articulo['fecha_ult'])),
                    'ult_fecha'    => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($articulo['ult_fecha'])),
                    'pm_com1'    => $articulo['pmcom1'],
                    'imagen'    => $articulo['imagen'],
                    'caracteristicas'    => $articulo['carac'],
                    'fecha_alta'    => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($articulo['ult_fecha'])),
                    'fecha_baja'    => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($articulo['fechabaja'])),
                    'ubicacion'    => $articulo['ubicacion'],
                    'medidas'    => $articulo['medidas'],
                    'peso'    => $articulo['peso'],
                    'litros'    => $articulo['litros'],
                    'observacion'    => $articulo['observacio'],
                    'unicaja'    => $articulo['unicaja'],
                    'desglose'    => $articulo['desglose'],
                    'aranceles'    => $articulo['aranceles'],
                    'definicion2'    => $articulo['definicion2'],
                    'subfamilia'    => $articulo['subfamilia'],
                    'internet'    => $articulo['internet'],
                    'vista'	=> $articulo['vista'],
                    'f_pag'    => $articulo['fpag'],
                    'p_verde'    => $articulo['pverde'],
                    'p_importe'    => $articulo['p_importe'],
                    'p_tan'    => $articulo['p_tan'],
                    'l_color'    => $articulo['lcolor'],
                    'margen'    => $articulo['margen'],
                    'tcp'    => $articulo['tcp'],
                    'ven_serie'    => $articulo['venserie'],
                    'puntos'    => $articulo['puntos'],
                    'des_esc'    => $articulo['des_esc'],
                    'tipo_art'    => $articulo['tipo_art'],
                    'modelo'    => $articulo['modelo'],
                    'cocina'    => $articulo['cocina'],
                    'stock'    => $articulo['stock'],
                    'art_impuesto'    => $articulo['art_impues'],
                    'nombre2'    => $articulo['nombre2'],
                    'color_art'    => $articulo['color_art'],
                    'tipo_pvp'    => $articulo['tipo_pvp'],
                    'cost_escan'    => $articulo['cost_escan'],
                    'tipo_escan'    => $articulo['tipo_escan'],
                    'art_canon'    => $articulo['art_canon'],
                    'actua_colo'    => $articulo['actua_colo'],
                    'fact_arepe'    => $articulo['fact_arepe'],
                    'fact_arepe'    => $articulo['fact_arepe'],
                    'alquiler'    => $articulo['alquiler'],
                    'orden'    => $articulo['orden'],
                    'c_ent'    => $articulo['c_ent'],
                    'cn8'    => $articulo['cn8'],
                    'iva_lot'    => $articulo['ivalot'],
                    'artant'    => $articulo['artant'],
                    'reportetiq'    => $articulo['reportetiq'],
                    'guid'    => $articulo['guid'],
                    'importar'    => $articulo['importar'],
                    'dto1'    => $articulo['dto1'],
                    'dto2'    => $articulo['dto2'],
                    'dto3'    => $articulo['dto3'],
                    'isp'    => $articulo['isp'],
                ],[
                    'codigo'    => $articulo['codigo'],
                    'nombre'    => $articulo['nombre'],
                    'abreviatura'    => $articulo['abrev'],
                    'familia'    => $articulo['familia'],
                    'marca'	=> $articulo['marca'],
                    'minimo'    => $articulo['minimo'],
                    'maximo'    => $articulo['maximo'],
                    'aviso'    => $articulo['aviso'],
                    'baja'    => $articulo['baja'],
                    'tipo_iva'    => $articulo['tipo_iva'],
                    'retencion'    => $articulo['retencion'],
                    'iva_inc'    => $articulo['iva_inc'],
                    'cost_ult1'    => $articulo['cost_ult1'],
                    'fecha_ult'    => $articulo['fecha_ult'],
                    'ult_fecha'    => $articulo['ult_fecha'],
                    'pm_com1'    => $articulo['pmcom1'],
                    'imagen'    => $articulo['imagen'],
                    'caracteristicas'    => $articulo['carac'],
                    'fecha_alta'    => $articulo['fechaalta'],
                    'fecha_baja'    => $articulo['fechabaja'],
                    'ubicacion'    => $articulo['ubicacion'],
                    'medidas'    => $articulo['medidas'],
                    'peso'    => $articulo['peso'],
                    'litros'    => $articulo['litros'],
                    'observacion'    => $articulo['observacio'],
                    'unicaja'    => $articulo['unicaja'],
                    'desglose'    => $articulo['desglose'],
                    'aranceles'    => $articulo['aranceles'],
                    'definicion2'    => $articulo['definicion2'],
                    'subfamilia'    => $articulo['subfamilia'],
                    'internet'    => $articulo['internet'],
                    'vista'	=> $articulo['vista'],
                    'f_pag'    => $articulo['fpag'],
                    'p_verde'    => $articulo['pverde'],
                    'p_importe'    => $articulo['p_importe'],
                    'p_tan'    => $articulo['p_tan'],
                    'l_color'    => $articulo['lcolor'],
                    'margen'    => $articulo['margen'],
                    'tcp'    => $articulo['tcp'],
                    'ven_serie'    => $articulo['venserie'],
                    'puntos'    => $articulo['puntos'],
                    'des_esc'    => $articulo['des_esc'],
                    'tipo_art'    => $articulo['tipo_art'],
                    'modelo'    => $articulo['modelo'],
                    'cocina'    => $articulo['cocina'],
                    'stock'    => $articulo['stock'],
                    'art_impuesto'    => $articulo['art_impues'],
                    'nombre2'    => $articulo['nombre2'],
                    'color_art'    => $articulo['color_art'],
                    'tipo_pvp'    => $articulo['tipo_pvp'],
                    'cost_escan'    => $articulo['cost_escan'],
                    'tipo_escan'    => $articulo['tipo_escan'],
                    'art_canon'    => $articulo['art_canon'],
                    'actua_colo'    => $articulo['actua_colo'],
                    'fact_arepe'    => $articulo['fact_arepe'],
                    'fact_arepe'    => $articulo['fact_arepe'],
                    'alquiler'    => $articulo['alquiler'],
                    'orden'    => $articulo['orden'],
                    'c_ent'    => $articulo['c_ent'],
                    'cn8'    => $articulo['cn8'],
                    'iva_lot'    => $articulo['ivalot'],
                    'artant'    => $articulo['artant'],
                    'reportetiq'    => $articulo['reportetiq'],
                    'guid'    => $articulo['guid'],
                    'importar'    => $articulo['importar'],
                    'dto1'    => $articulo['dto1'],
                    'dto2'    => $articulo['dto2'],
                    'dto3'    => $articulo['dto3'],
                    'isp'    => $articulo['isp'],
                ]);
            }
        }
        
        return redirect()->back();
    }

    /**
     * Subir imágenes y redimensionarlas.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function imgs(Request $request){
        $fotos = $request->file('inputimg');
        
        foreach($fotos as $foto){
            $filename = $foto->getClientOriginalName();
            
            $img = Image::make($foto)->resize(250, 300)->save(storage_path('app/public/' . $request->code_img . '_' . $filename));
            
            $articulo = Articulo::findOrFail($request->code_img);
            
            $articulo->imagen = '/storage/' . $request->code_img . '_' . $filename;
            
            $articulo->update();
        }
        
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $articulo = new Articulo();
        
        $articulo->codigo = $request->code;
        $articulo->nombre = $request->name;
        $articulo->familia = $request->family;
        $articulo->condicion = $request->condicion;
        $articulo->marca = $request->marca;
        $articulo->caracteristicas = $request->caract;
        $articulo->modelo = $request->model;
        $articulo->fecha_alta = $request->f_alta;
        $articulo->fecha_baja = $request->f_baja;
        $articulo->stock = $request->stock;
        $articulo->tipo_iva = $request->iva;
        $articulo->garantia = $request->garantia;
        
        $param['codigo'] = $request->code;
        $param['nombre'] = $request->name;
        $param['familia'] = $request->family;
        $param['condicion'] = $request->condicion;
        $param['marca'] = $request->marca;
        $param['caracteristicas'] = $request->caract;
        $param['modelo'] = $request->model;
        $param['fecha_alta'] = $request->f_alta;
        $param['fecha_baja'] = $request->f_baja;
        $param['stock'] = $request->stock;
        $param['tipo_iva'] = $request->iva;
        $param['garantia'] = $request->garantia;
        
        try{
            $articulo->save();
            return response()->json($param);
        }catch(\Exception $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return console.log('Entrada duplicada');
            }
        }
        
    }
    
    /**
     * Display the specified product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $producto = Articulo::find($id);
        $relacionados = Articulo::where('familia', $producto->familia)->inRandomOrder()->get();
        $carritos = Carrito::where('usuario_id', Auth::id())->get();
        $carritos->toArray();
        return view('user.mostrar_producto', compact('producto', 'relacionados', 'carritos'));
    }
    
    /**
     * Muestra Novedades, Ofertas u Outlet según corresponda.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_condicion($id){
        $carritos = Carrito::where('usuario_id', Auth::id())->get();
        $carritos->toArray();
        switch($id){
            case 1:
                $ofertas = Articulo::where('condicion', $id)->paginate(6);
                $familias = Familia::all();
                $marcas = Marca::all();
                $condicion = Condicion::where('id', $id)->get();
                return view('user.mostrar_ofertas', compact('ofertas', 'familias', 'marcas', 'condicion', 'carritos'));
            case 2:
                $novedades = Articulo::where('condicion', $id)->paginate(6);
                $familias = Familia::all();
                $marcas = Marca::all();
                $condicion = Condicion::where('id', $id)->get();
                return view('user.mostrar_novedades', compact('novedades', 'familias', 'marcas', 'condicion', 'carritos'));
            case 3:
                $outlet = Articulo::where('condicion', $id)->paginate(6);
                $familias = Familia::all();
                $marcas = Marca::all();
                $condicion = Condicion::where('id', $id)->get();
                return view('user.mostrar_outlet', compact('outlet', 'familias', 'marcas', 'condicion', 'carritos'));
        }
    }
    
    /**
     * Display the specified filter.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_filtro($marca, $familia, $precio_min, $precio_max){
        $marca_id = Marca::where('marca', $marca)->first();
        $familia_id = Familia::where('familia', $familia)->first();
        
        $articulos = Articulo::where('marca', $marca_id->id)->where('familia', $familia_id->id)->where('cost_ult1', '<=', $precio_min)->where('cost_ult1', '>=', $precio_max)->get();
        
        $carritos = Carrito::where('usuario_id', Auth::id())->get();
        $carritos->toArray();
        return view('user.filtro', compact('articulos', 'carritos'));
    }
    
    /**
     * Display the specified filter only with Marca or Familia.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_filtro_marca_familia($marca_familia, $precio_min, $precio_max){
        try {
            $marca_id = Marca::where('marca', $marca_familia)->first();

            $articulos = Articulo::where('marca', $marca_id->codigo)->whereBetween('cost_ult1', [$precio_min, $precio_max])->get();

            $carritos = Carrito::where('usuario_id', Auth::id())->get();
            $carritos->toArray();
            
            return view('user.filtro', compact('articulos', 'carritos'));
        } catch (\Exception $e) {
            $familia_id = Familia::where('familia', $marca_familia)->first();

            $articulos = Articulo::where('familia', $familia_id->codigo)->whereBetween('cost_ult1', [$precio_min, $precio_max])->get();
            
            $carritos = Carrito::where('usuario_id', Auth::id())->get();
            $carritos->toArray();
            
            return view('user.filtro', compact('articulos', 'carritos'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
