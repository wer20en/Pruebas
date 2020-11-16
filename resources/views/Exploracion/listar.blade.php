@extends('layout.general')
@section('breadcumb')
<li class="breadcrumb-item" ><a href="/">INICIO</a></li>
<li class="breadcrumb-item"><a href="/Productos">Productos</a></li>
<li class="breadcrumb-item active">Categorias</li>
@endsection


@section('content')
<div class="text-center py-5">
  <div class="container">
    <div class="row my-5 justify-content-center">
      <div class="col-md-9">
        <h1>Mercado ITTG</h1>
        <p class="lead text-muted">Bienvenido a este sitio que permite realizar compras en linea, si quieres vender crea una cuenta con nostros, si quieres comprar tambien. Tenemos muchos productos en diversas categorias...</p>
      </div>

      <div class="col-12">
          @guest
          <p class="lead text-muted">Buscar.
              <div class="form-check form-check-inline">
                  <form action="" method="post">
                      <input type="search" class="form-control" id="search-input" placeholder="Buscar..."  autocomplete="off" spellcheck="false" role="combobox">
                  </form>
              </div>          
          </p>
          @endguest

      </div>

  </div>
  </div>
</div>

<div class="py-4 bg-light" >
  <div class="container">
    <div class="row">
        <h1>Categoria: {{$categoria->nombre}}</h1>
    </div>
    <div class="row">
    @forelse ($categoria->productos as $producto)
      <div class="col-md-4 p-3">
        <div class="card box-shadow">
          <img class="card-img-top" src="/prods/{{$producto->imagen}}" >
          <div class="card-body">
            <p class="card-text">
              <p>{{$producto->nombre}}</p>
              <p>{{$producto->descripcion}}</p>
              
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <button type="button" class="btn btn-lg btn-block btn-outline-secondary">...</button>   
              </div>
            </div>
          </div>
        </div>
      </div>
    @empty
        Esta categoria no tiene productos.    
    @endforelse
  </div>
  </div>
</div>
<footer class="text-muted py-5">
  <div class="container">
    <p class="float-right">
      <a href="#">Volver arriba</a>
    </p>
    <p>Sitio que usa bootstrap, jquery y LARAVE.&nbsp;
  </p>
  </div>
</footer>

@endsection