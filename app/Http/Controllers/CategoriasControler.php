<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriasControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('supervisor.Categorias.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supervisor.Categorias.create');
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
        switch ($id) {
            case '1':
                $seccion = "electrónica";
                break;
            case '2':
                $seccion = "electrodomesticos";
                break;
            case '3':
                $seccion = "ropa";
                break;
            default:
                return "Error::::";
                break;
        }
        return view('supervisor.Categorias.show',compact('seccion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        switch ($id) {
            case '1':
                $seccion = "electrónica";
                break;
            case '2':
                $seccion = "electrodomesticos";
                break;
            case '3':
                $seccion = "ropa";
                break;
            default:
                return "Error::::";
                break;
        }
        return view('supervisor.Categorias.edit',compact('seccion'));
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
