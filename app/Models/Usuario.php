<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable

{
    public $timestamps = false;
    protected $fillable = ['nombre','a_paterno','a_materno','imagen','rol','activo','password'];
}