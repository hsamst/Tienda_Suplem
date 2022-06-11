<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/Tienda/css/Styles.css">
    <link href='https://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css'>
    <title>Suplements&Workout</title>
  </head>
  <body>

  <nav id="menu" class="navbar navbar-dark navbar-expand-md sticky-top">
        <a class="navbar-brand" href="Index.html">
          <img src="/Tienda/image/logo.png" width="190" height="55" alt="Logo"/>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
          aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <div class="navbar-nav text-center ml-auto mr-auto">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown"><a class="nav-link active" href="../view/pantallaInicio.php"><i class="bi bi-house-door"></i>  Home </a></li>
            <li class="nav-item dropdown"><a class="nav-link active" href="../../panel/ventas/ctrlVentas.php"><i class="bi bi-house-door"></i>  Ventas </a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-people">Personas</i>
              </a>
              <div class="dropdown-menu" aria-label="navbarDropdown">
                <a class="dropdown-item" href="../../panel/proveedores/ctrlProveedor.php">Proveedores</a>
                <a class="dropdown-item" href="../../panel/cliente/ctrlCliente.php">Clientes</a>
                <a class="dropdown-item" href="../../panel/usuario/ctrlUsuario.php">Usuarios</a>
                <a class="dropdown-item" href="../../panel/rol/ctrlRol.php">Roles</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-expanded="false">
                Productos
              </a>
              <div class="dropdown-menu" aria-label="navbarDropdown">
                <a class="dropdown-item" href="../../panel/productos/ctrlProducto.php">Lista de productos</a>
                <a class="dropdown-item" href="../../panel/tipo/ctrlTipo.php">Lista de las marcas del producto</a>
                <a class="dropdown-item" href="../../panel/proveedores/ctrlProveedor.php">Nuestros Proveedores</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-three-dots-vertical"></i>Otros y +
              </a>
              <div class="dropdown-menu" aria-label="navbarDropdown">
                <a class="dropdown-item" href="../../panel/paqueteria/ctrlPaqueteria.php">Paqueterias</a>
                <a class="dropdown-item" href="../../panel/estatus/ctrlEstatus.php">Estatus</a>
                <a class="dropdown-item" href="../../panel/tipo_pago/ctrlTipPa.php">Formas de pago</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown4" role="button" data-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-circle"><?php echo $_SESSION['correo']; ?> </i>
              </a>
              <div class="dropdown-menu" aria-label="navbarDropdown">
                <a class="dropdown-item" href="../../panel/paqueteria/ctrlPaqueteria.php">Usuario</a>
                <a class="dropdown-item" href="../../panel/login/ctrlLogin.php?accion=logOut">Cerrar sesion</a>
              </div>
            </li>
</ul>
        </div>

          <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Search</button>
          </form>
        </div>
  </nav>
