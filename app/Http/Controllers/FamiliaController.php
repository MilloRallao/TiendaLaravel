<?php

namespace App\Http\Controllers;

use App\Familia;
use App\Articulo;
use App\Marca;
use App\Carrito;
use Auth;
use App\Exports\FamiliaExport;
use App\Imports\FamiliaImport;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class FamiliaController extends Controller{
    
    /**
    * Exportar tabla artículos
    * @return \Illuminate\Support\Collection
    */
    public function export(){
        return Excel::download(new FamiliaExport, 'familias.xlsx');
    }
    
    /**
    * Importar tabla artículos
    * @return response
    */
    public function import(Request $request){
        $this->validate($request, [
            'input42' => 'required'
        ]);
        
        $familias = Excel::toCollection(new FamiliaImport, $request->file('input42')[0]);
        
        if($familias){
            foreach($familias[0] as $familia){
                //Comprobar si hay valores nuevos que insertar, si no, actualizar
                Familia::firstOrCreate([
                    'codigo'    => $familia['codigo'],
                    'familia'    => $familia['nombre']
                ],[
                    'codigo'    => $familia['codigo'],
                    'familia'    => $familia['nombre']
                ]);
            }
            return redirect()->back()->with('success', 'Importación hecha con éxito');
        }else{
            return redirect()->back()->with('error', 'Error al importar');
        }
        
    }
    
    /**
     * Update the specified resource on the fly.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_family(Request $request){
        for($i = 1; $i <= count($request->all()); $i++){
            $param['familia'] = $request->family;
            $select_familia = Familia::where('codigo', $request->code)->get();
            $familia = Familia::findOrFail($select_familia[0]->id);
            $result = $familia->update($param);
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
            $select_familia = Familia::where('codigo', $request->$code)->get();
            $familia = Familia::findOrFail($select_familia[0]->id);
            $result = $familia->delete();
        }
        return response()->json($result);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $familias = Familia::orderBy('codigo', 'ASC')->get();
        
        return view('admin.familias', compact('familias'));
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
            
            $select_familia = Familia::where('codigo', $request->code_img)->get();
            
            $familia = Familia::findOrFail($select_familia[0]->id);
            
            $familia->ruta_imagen = '/storage/' . $request->code_img . '_' . $filename;
            
            $familia->update();
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
        $param['familia'] = $request->family;
        
        Familia::firstOrCreate([
                    'codigo'    => $request->code
                ],[
                    'codigo'    => $request->code,
                    'familia'    => $request->family
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
        $familia = Familia::find($id);
        $familia_codigo = $familia->codigo;
        $articulos = Articulo::where('familia', $familia_codigo)->paginate(6);
        $marcas = Marca::all();
        $carritos = Carrito::where('usuario_id', Auth::user()->id)->get();
        $carritos->toArray();
        return view('user.mostrar_categoria', compact('articulos', 'familia', 'marcas', 'carritos'));
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
