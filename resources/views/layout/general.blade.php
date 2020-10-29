


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
  <div class="container-fluid">
    <div class="row">
      <div class="col-2">
        <div class="row">
          <div class="col-3">
            <img src="http://placehold.it/50/30a5ff/fff" class="img-thumbnail rounded-1" alt="">
          </div>
          <div class="col-9">
            <div class="user-name">Username</div>
            <div class="user-status text-success">Online</div>
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
				@yield('menu')
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