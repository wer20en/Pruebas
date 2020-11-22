@extends('layout.general')
@section('breadcumb')
<li class="active">Inicio</li>
@endsection
@section('content')

@switch(Auth::user()->rol)
    @case( 'Supervisor' )
    <div class="card-columns">
        <div class="card">
            <img class="card-img-top" src="/fotos/usuarios.png" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Usuarios registrados</h5>
              <p class="card-text">Clientes: {{$clientes ?? ''}} </p>
              <p class="card-text">Empleados: {{$empleados}}</p>
            </div>
        </div>

        <div class="card">
            <img class="card-img-top" src="/prods/productos.png" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Productos</h5>
              <p class="card-text">Registrados: {{$productos}}</p>
              <p class="card-text">Concesionados: {{$concesionados}}</p>
            </div>
          </div>

          <div class="card">
            <img class="card-img-top" src="/secciones/categorias.png"  height="300" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Categorias</h5>
              <p class="card-text">Registradas: {{$categorias}} </p>
            </div>
          </div>
      </div>
        @break
    @case('Encargado')
        dash del encargado
        @break
    @case('Contador')
        dash del Contador    
        @break
    @case('Cliente')
        dash del Cliente    
        @break
    
@endswitch

        

@endsection