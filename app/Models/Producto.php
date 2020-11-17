<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $timestamps = false;
    protected $fillable = ['nombre','descripcion','precio','imagen','usuario_id','categoria_id','concesionado'];
    
    public function propietario(){
        return $this->hasOne('App\Models\Usuario','id','usuario_id');
    }

    public function categoria(){
        return $this->hasMany('App\Models\Categoria','id','categoria_id');
    }

    public function estaConcesionado(){
        if($this->concesionado) 
            return "SI";
        else
            return "No";
    }

    public function usuario(){
        return $this->belongsTo('App\Models\Usuario');        
    }
}
