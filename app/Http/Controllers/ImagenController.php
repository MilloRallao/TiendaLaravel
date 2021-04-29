<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imagen;
use App\Articulo;
use Intervention\Image\ImageManagerStatic as Image;

class ImagenController extends Controller
{
    
    /**
     * Subir imágenes y redimensionarlas.
     *
     */
    public function imgs(Request $request){
        $this->validate($request, [
            'inputimg' => 'required'
        ]);
        
        $fotos = $request->file('inputimg');
        
        foreach($fotos as $foto){
            $filename = $foto->getClientOriginalName();
            
            $img = Image::make($foto)->resize(250, 300)->save(storage_path('app/public/' . $request->code_img . '_' . $filename));
            $img_thumbnail = Image::make($foto)->resize(45, 55)->save(storage_path('app/public/' . $request->code_img . '_thumbnail_' . $filename));
            $img_large = Image::make($foto)->resize(900, 1024)->save(storage_path('app/public/' . $request->code_img . '_large_' . $filename));
            
            $articulo = Articulo::findOrFail($request->code_img);
            $articulo->imagen = $request->code_img;
            $articulo->update();
            
            $imagen = new Imagen();
            $imagen->codigo_articulo = $request->code_img;
            $imagen->ruta_imagen = '/storage/' . $request->code_img . '_' . $filename;
            $imagen->ruta_imagen_thumbnail = '/storage/' . $request->code_img . '_thumbnail_' . $filename;
            $imagen->ruta_imagen_large = '/storage/' . $request->code_img . '_large_' . $filename;
            $imagen->save();
        }
        
        return redirect()->back();
    }
    
    /**
     * Borrar imágenes mediante Ajax.
     *
     */
    public function img_delete(Request $request){
        $id = Imagen::where('ruta_imagen', $request->src)->get();
        $imagen = Imagen::findOrFail($id[0]->id);
        $result = $imagen->delete();
        return response()->json($result);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
