<!DOCTYPE html>
<html>
  
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/bootstrap-4.5.3-dist/css/bootstrap.min.css">
  @yield('estilos')
  <script src="/bootstrap-4.5.3-dist/js/jquery-3.5.1.min.js"></script>
  <script src="/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
  @yield('escripts')
</head>

<body >


  @guest
  <div class="collapse bg-dark text-white " id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-md-7 py-4">
          <h4>About</h4>
          <p class="text-info">Mercado ITTG es un proyecto de la materia de programacion web con frameworks para desarrollar una aplicacion de compra-venta por internet.</p>
        </div>
        <div class="col-md-3 offset-md-1 py-4">
          <h4>Contact</h4>
          <ul class="list-unstyled">
            <li>
              <a href="#" class="text-secondary">Siguenos en Twitter</a>
            </li>
            <li>
              <a href="#" class="text-secondary">Buscanos en Facebook</a>
            </li>
            <li>
              <a href="/autenticar" class="text-info">Iniciar sesion</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark">
    <div class="container d-flex justify-content-between">
      <a href="#" class="navbar-brand d-flex align-items-center"><i class="fa d-inline fa-camera mr-2"></i><strong>MERCADOITTG</strong> </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader"> <span class="navbar-toggler-icon"></span> </button>
    </div>
  </div>
  @else
      <header class="navbar navbar-dark bg-dark navbar-expand flex-column flex-md-row bd-navbar">
      <a class="navbar-brand mr-0 mr-md-2" href="/" aria-label="Bootstrap">MERCADOITTG</a>
      <div class="navbar-nav-scroll">
      </div>
      <ul class="navbar-nav ml-md-auto">
        <li class="nav-item dropdown">
          <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z"></path>
              <path fill-rule="evenodd" d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"></path>
            </svg> </a>
          <div class="dropdown-menu dropdown-menu-md-right" aria-labelledby="bd-versions">
            <a class="dropdown-item active" href="#">UNO</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">otro</a>
            <a class="dropdown-item" href="#">otro</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">varios</a>
          </div>
        </li>
      </ul>
    </header>
    
  @endguest

  <div class="container-fluid">
    @auth
    <div class="row">
      <div class="col-2">
        <div class="row">
          <div class="col-3">
            <img src="/fotos/{{Auth::user()->imagen}}" class="img-thumbnail rounded-1" alt="">
          </div>
          <div class="col-9">
            <div class="user-name">{{Auth::user()->nombre}}<br>({{Auth::user()->rol}}) </div>
            <a href="/salir">Salir</a>
          </div>
        </div>
        <div class="dropdown-divider"></div>
        <div class="row">
          <form>
            <input type="search" class="form-control" id="criterio" placeholder="Buscar..." autocomplete="off" spellcheck="false" style="position: relative; vertical-align: top;">
          </form>
        </div>
        <div class="dropdown-divider"></div>
        <div class="row">
          <div class="contetn-fuid">
			<ul class="nav " >
        {{-- @yield('menu') --}}
        @switch(Auth::user()->rol)
            @case( 'Supervisor' )
              <li class="dropdown-item"><a href="/tablero">Dashboard</a></li>
              <li class="dropdown-item"><a href="/Categorias">Categorias</a></li>
              <li class="dropdown-item"><a class="text-success" href="/Usuarios">Usuarios</a></li>
              @break
            @case('Encargado')
              <li class="dropdown-item"><a href="/tablero">Dashboard</a></li>
              <li class="dropdown-item"><a href="#">Revisar</a></li>
              @break
            @case('Contador')
              <li class="dropdown-item"><a href="/tablero">Dashboard</a></li>
              <li class="dropdown-item"><a href="#">Totalizar</a></li>
              @break
          @case('Cliente')
            <li class="dropdown-item"><a href="/tablero">Dashboard</a></li>
            <li class="dropdown-item"><a href="Productos">Productos</a></li>
            <li class="dropdown-item"><a href="#">Preguntas</a></li>
            <li class="dropdown-item"><a href="#">Estado de cuenta</a></li>
            @break
            
        @endswitch

			</ul>
			</div>
        </div>
      </div>
      <div class="col-10">
        <div class="row">
          <div class="col-12">
            <div class="contetn-fluid">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
					@yield('breadcumb')
                </ol>
              </nav>
            </div>
          </div>
        </div>
  @endauth




        <div class="row">
          <div class="col-12">
            <div class="contetn-fluid">
              @yield('content')
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
    @yield('escripts2')
</body>

</html>

{{-- yield('estilos')
yield('escripts')
yield('menu')
yield('breadcumb')
yield('content')
yield('escripts2')
 --}}