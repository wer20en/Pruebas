<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class IncioControler extends Controller
{
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
            
            default:
                return view('tablero');
                break;
        }
    }
}


