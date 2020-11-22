<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;


class RevisarControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $productos = Producto::all()->whereNull('concesionado');

        /*Aqui podemos hacer algunas cosas, como seleccionar que productos son los que cumplen cierta 
        condicion y los listaremos por ejemplo*/

        return view('Revisiones.index',compact('productos'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);
        return view('Revisiones.show',compact('producto'));
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
        $valores = $request->all();
        $imagen = $request->file('imagen');
        if(!is_null($imagen)){
            $ruta_destino = public_path('fotos/');
            $nombre_de_archivo = $imagen->getClientOriginalName();
            $imagen->move($ruta_destino, $nombre_de_archivo);        
            $valores['imagen']=$nombre_de_archivo;
        }
        $valores['usuario_id']=Auth::id();
        $registro = Producto::find($id);
        if($registro->concesionado==0)$registro->concesionado=null;
        $registro->fill($valores);
        $registro->save();


        return redirect("/Productos")->with('mensaje','Producto modificado correctamente');
    }

}
