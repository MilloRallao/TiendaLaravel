<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\Deseo;
use App\Carrito;
use Auth;
use Illuminate\Http\Request;

class DeseoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $deseos = Deseo::where('id_usuario', Auth::user()->id)->get();
        $deseos->toArray();
        $carritos = Carrito::where('usuario_id', Auth::user()->id)->get();
        $carritos->toArray();
        return view('user.deseos', compact('deseos', 'carritos'));
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
    public function delete_wish(Request $request){
        try {
            $deseo_id = Deseo::where('id_articulo', $request->code)->get();
            $deseo = Deseo::findOrFail($deseo_id->id);
            $result = $deseo->delete();

            return response()->json($result);
        } catch (\Exception $e) {
            $deseo = Deseo::findOrFail($request->code);
            $result = $deseo->delete();

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
        $deseo = new Deseo();
        
        $deseo->id_usuario = Auth::id();
        $deseo->id_articulo = $request->code;
        
        $param['id_usuario'] = Auth::id();
        $param['id_articulo'] = $request->code;
        
        try{
            $deseo->save();
            return response()->json($param);
        }catch(\Exception $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                $result = $deseo->update($param);
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
