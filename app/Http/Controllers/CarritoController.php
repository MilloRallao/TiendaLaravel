<?php

namespace App\Http\Controllers;

use App\Carrito;
use App\Articulo;
use Auth;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $carritos = Carrito::where('usuario_id', Auth::user()->id)->get();
        $carritos->toArray();
        $precio_total = 0;
        foreach($carritos as $carrito){
            $precio_total += $carrito->precio_total;
        }
        return view('user.carrito', compact('carritos', 'precio_total'));
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
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete_carrito(Request $request){
        try {
            $carrito_id = Carrito::where('articulo_id', $request->code)->first();
            $carrito = Carrito::findOrFail($carrito_id->id);
            $result = $carrito->delete();

            return response()->json($result);
        } catch (\Exception $e) {
            $carrito = Carrito::findOrFail($request->code);
            $result = $carrito->delete();

            return response()->json($result);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $articulo = new Carrito();
        
        $articulo->usuario_id = Auth::id();
        $articulo->articulo_id = $request->code;
        $articulo->unidades = $request->units;
        $articulo_precio = Articulo::where('id', $request->code)->first();
        $articulo->precio_total = $articulo_precio->cost_ult1*$request->units;
        
        $param['usuario_id'] = Auth::id();
        $param['articulo_id'] = $request->code;
        $param['unidades'] = $request->units;
        $param['precio_total'] = $articulo_precio->cost_ult1*$request->units;
        
        try{
            $articulo->save();
            return response()->json($param);
        }catch(\Exception $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                $carrito_id = Carrito::where('usuario_id', Auth::id())->where('articulo_id', $request->code)->first();
                $carrito = Carrito::findOrFail($carrito_id->id);
                $result = $carrito->update($param);
                return response()->json($result);
            }
        }
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
    public function update(Request $request, $id){
        //
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_carrito(Request $request){
        $param['unidades'] = $request->units;
        $param['precio_total'] = $request->precio*$request->units;
        $carrito = Carrito::findOrFail($request->code);
        $result = $carrito->update($param);
        return response()->json($result);
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
