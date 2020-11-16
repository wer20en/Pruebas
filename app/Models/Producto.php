<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $timestamps = false;
    protected $fillable = ['nombre','descripcion','precio','imagen','usuario_id','categoria_id','concesionado'];

    public function usuario(){
        return $this->belongsTo('App\Models\Usuario');
    }
    public function propietario(){
        return $this->belongsTo('App\Models\Usuario','usuario_id');
    }
    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }
    public function estaConcesionado(){
        if($this->concesionado) 
            return "SI";
        else
            return "No";
    }
}
