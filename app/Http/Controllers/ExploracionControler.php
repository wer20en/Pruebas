<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;


class ExploracionControler extends Controller
{
    public function listar_por($categoria_id){
        //procesamos la cadena buscar
        $categoria = Categoria::find($categoria_id);
        return view('Exploracion.listar',compact('categoria'));

    }
}
