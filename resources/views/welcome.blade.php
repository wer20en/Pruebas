<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- PAGE settings -->
  <title>BIENVENIDOS</title>
  <meta name="description" content="Sitio de compra-venta de productos">
  <meta name="keywords" content="compra venta consigancion">
  <meta name="author" content="ittg">
  <!-- CSS dependencies -->
  <link rel="stylesheet" href="/bootstrap-4.5.3-dist/css/bootstrap.min.css">

    <!-- js -->
  <script src="/bootstrap-4.5.3-dist/js/jquery-3.5.1.min.js"></script>
  <script src="/bootstrap-4.5.3-dist/js/bootstrap.bundle.js"></script>
</head>
<body>
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
              <a href="#" class="text-secondary">Follow on Twitter</a>
            </li>
            <li>
              <a href="#" class="text-secondary">Like on Facebook</a>
            </li>
            <li>
              <a href="#" class="text-info">Iniciar sesion</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark">
    <div class="container d-flex justify-content-between">
      <a href="#" class="navbar-brand d-flex align-items-center"><i class="fa d-inline fa-camera mr-2"></i><strong>Album</strong> </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader"> <span class="navbar-toggler-icon"></span> </button>
    </div>
  </div>

  <div class="text-center py-5">
    <div class="container">
      <div class="row my-5 justify-content-center">
        <div class="col-md-9">
          <h1>Mercado ITTG</h1>
          <p class="lead text-muted">Bienvenido a este sitio que permite realizar compras en linea, si quieres vender crea una cuenta con nostros, si quieres comprar tambien. Tenemos muchos productos en diversas categorias...</p>
        </div>

        <div class="col-12">
            <p class="lead text-muted">Buscar.

                <div class="form-check form-check-inline">
                    <form action="" method="post">
                        <input type="search" class="form-control" id="search-input" placeholder="Buscar..."  autocomplete="off" spellcheck="false" role="combobox">
                    </form>
                </div>          
    

            </p>
        </div>

    </div>
    </div>
  </div>

  <div class="py-4 bg-light" >
    <div class="container">
      <div class="row">
  @foreach ($categorias as $categoria)
        <div class="col-md-4 p-3">
          <div class="card box-shadow">
            <img class="card-img-top" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg">
            <div class="card-body">
              <p class="card-text">Descripcion de la categoria n.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-lg btn-block btn-outline-secondary">Ver productos...</button>   
                </div>
              </div>
            </div>
          </div>
        </div>
@endforeach
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
</body>
</html>