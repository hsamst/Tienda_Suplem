<?php require_once('../Sistema.class.php');?>
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
          <ul class="nav navbar-nav mr-auto">
            
          <li class="nav-item dropdown"><a class="nav-link active" href="../view/homeC.php"><i class="bi bi-house-door"></i>  Home </a></li>
          <li class="nav-item dropdown"><a class="nav-link active" href="../../panel/cliente/ctrlVistaCliente.php"><i class="bi bi-shop"></i>  Productos </a></li>
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-three-dots-vertical"></i> Otros y +
              </a>
              <div class="dropdown-menu" aria-label="navbarDropdown">
                <a class="dropdown-item" href="../view/contactoC.php"><i class="bi bi-person-lines-fill"></i>  Contacto</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-circle"><?php echo $_SESSION['correo']; ?> </i>
              </a>
              <div class="dropdown-menu" aria-label="navbarDropdown">
                <a class="dropdown-item" href="../cliente/ctrlCompraCL.php"><i class="bi bi-bag"></i>   Mis compras</a>
                <a class="dropdown-item" href="../../panel/login/ctrlLogin.php?accion=logOut"><i class="bi bi-x-circle"></i>  Cerrar sesion</a>
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