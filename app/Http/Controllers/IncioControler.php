<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Pregunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class IncioControler extends Controller
{
    public function index(){
        $categorias = Categoria::all();
        return view('welcome',compact('categorias') );
    }
    public function tablero(){
        switch (Auth::user()->rol) {
            case 'Supervisor':
                $usuarios = DB::table('usuarios')->count();
                $clientes = DB::select('SELECT count(*) as cuantos from usuarios where rol = "Cliente"')[0]->cuantos;
                $empleados = DB::select('SELECT count(*) as cuantos from usuarios where rol <> "Cliente"')[0]->cuantos;
                $productos = DB::table('productos')->count();
                $concesionados = DB::select('SELECT count(*) as cuantos from productos where concesionado = 1')[0]->cuantos;
                $categorias = DB::table('categorias')->count();
                return  view('tablero', compact('usuarios','clientes','empleados','productos','concesionados','categorias') );
                break;
            case 'Encargado':
                $propuestas = Producto::all()->whereNull('concesionado')->count();
                $preguntas= Pregunta::all()->whereNull('p_autorizada')->count();
                $respuestas= Pregunta::all()->whereNotNull('respuesta')->whereNull('r_autorizada')->count();
                return  view('tablero', compact('propuestas','preguntas','respuestas') );
                break;
                        
            default:
                return view('tablero');
                break;
        }
    }
}


