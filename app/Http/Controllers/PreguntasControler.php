<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Producto;
use App\Models\Pregunta;

class PreguntasControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $comentarios = DB::select('Select * from preguntas where p_autorizada IS NULL or r_autorizada IS NULL');
        $comentarios = DB::select(" (select id, 'PREGUNTA' as tipo, pregunta as cuestion from preguntas where p_autorizada IS NULL)
                                    UNION 
                                    (select id, 'RESPUESTA' as tipo, respuesta as cuestion from preguntas where respuesta IS NOT NULL and r_autorizada IS NULL)");         
//         $comentarios = Pregunta::whereIsNull('p_autorizada');
        /*Aqui podemos hacer algunas cosas, como seleccionar que preguntas son los que cumplen cierta 
        condicion y los listaremos por ejemplo*/

        return view('Preguntas.index',compact('comentarios'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $producto = Producto::find($id);
        if(is_null($producto) ) return "UPSS, PRODUCTO NO ENCONTRADO.";
        return view('Preguntas.create',compact('producto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valores = $request->all();
        $valores['quien_p']=Auth::id();
        $registro = new Pregunta();
        $registro->fill($valores);
        $registro->save();

        return redirect("/");
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pregunta = Pregunta::find($id);
        return view('Preguntas.edit',compact('pregunta'));
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

        $registro = Pregunta::find($id);
        if (is_null($registro->p_autorizada))
            $valores['p_autorizada']= date('Y-m-d  H:i:s');
        else 
            $valores['r_autorizada']= date('Y-m-d  H:i:s');
        $registro->fill($valores);
        $registro->save();

        return redirect("/Preguntas")->with('mensaje','Pregunta autorizada correctamente');

    }
   //    return;

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //podemos hacer validaciones para borrar o no
        try {
            $registro = Pregunta::find($id);
            $registro->delete();
            return redirect("/Preguntas")->with('mensaje','Pregunta modificado correctamente');
        }catch (\Illuminate\Database\QueryException $e) {
            return redirect("/Preguntas")->with('error',$e->getMessage());
        }
       
    }
}