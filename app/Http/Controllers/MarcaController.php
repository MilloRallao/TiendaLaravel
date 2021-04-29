<?php

namespace App\Http\Controllers;

use App\Marca;
use App\Articulo;
use App\Familia;
use App\Carrito;
use Auth;
use App\Exports\MarcaExport;
use App\Imports\MarcaImport;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class MarcaController extends Controller{
    
    /**
    * Exportar tabla artículos
    * @return \Illuminate\Support\Collection
    */
    public function export(){
        return Excel::download(new MarcaExport, 'marcas.xlsx');
    }
    
    /**
    * Importar tabla artículos
    * @return response
    */
    public function import(Request $request){
        $this->validate($request, [
            'input42' => 'required'
        ]);
        
        $marcas = Excel::toCollection(new MarcaImport, $request->file('input42')[0]);
        
        if($marcas){
            foreach($marcas[0] as $marca){
                //Comprobar si hay valores nuevos que insertar, si no, actualizar
                Marca::firstOrCreate([
                    'codigo'    => $marca['codigo'],
                    'marca'    => $marca['nombre']
                ],[
                    'codigo'    => $marca['codigo'],
                    'marca'    => $marca['nombre']
                ]);
            }
            return redirect()->back()->with('success', 'Importación hecha con éxito');
        }else{
            return redirect()->back()->with('error', 'Error al importar');
        }
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $marcas = Marca::orderBy('codigo', 'ASC')->get();
        
        return view('admin.marcas', compact('marcas'));
    }
    
    /**
     * Update the specified resource on the fly.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_marca(Request $request){
        for($i = 1; $i <= count($request->all()); $i++){
            $param['marca'] = $request->marca;
            $select_marca = Marca::where('codigo', $request->code)->get();
            $marca = Marca::findOrFail($select_marca[0]->id);
            $result = $marca->update($param);
        }
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
            $select_marca = Marca::where('codigo', $request->$code)->get();
            $marca = Marca::findOrFail($select_marca[0]->id);
            $result = $marca->delete();
        }
        return response()->json($result);
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
            
            $img = Image::make($foto)->save(storage_path('app/public/' . $request->code_img . '_' . $filename));
            
            $select_marca = Marca::where('codigo', $request->code_img)->get();
            
            $marca = Marca::findOrFail($select_marca[0]->id);
            
            $marca->ruta_imagen = '/storage/' . $request->code_img . '_' . $filename;
            
            $marca->update();
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
        $param['codigo'] = $request->code;
        $param['marca'] = $request->marca;
        
        Marca::firstOrCreate([
                    'codigo'    => $request->code
                ],[
                    'codigo'    => $request->code,
                    'marca'    => $request->marca
                ]);
        
        return response()->json($param);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $marca = Marca::find($id);
        $marca_codigo = $marca->codigo;
        $articulos = Articulo::where('marca', $marca_codigo)->paginate(6);
        $familias = Familia::all();
        $carritos = Carrito::where('usuario_id', Auth::user()->id)->get();
        $carritos->toArray();
        return view('user.mostrar_marca', compact('articulos', 'marca', 'familias', 'carritos'));
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
