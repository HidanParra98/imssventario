<?php
include '../backend/conexion.php';

session_start();
    $usuario = $_SESSION['username'];
    
    if(!isset($usuario)){
        header("location: ../index.html");
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/tabla.css">
    <title>Inventario</title>
</head>
<body>
<div class="container-fluid padre">
  <!--NAVBAR-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <h1 class="navbar-brand">SERVICIO</h1>
    <!--CALENDARIO-->
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" id="fecha" type="date">
    </form>
    <!--BOTON TOGGLER-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!--DIV DE CONTENIDO PARA EL TOGGLER-->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!--GRUPO DE BOTONES-->
      <ul class="navbar-nav mr-auto">
        <!--DROPDOWN DEL BOTON AGREGAR-->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Agregar
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Categoria</a>
            <a class="dropdown-item" href="#">Servicio</a>
            <a class="dropdown-item" href="#">Material</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"></a>
          </div>
        </li>
        <!--FIN DEL DROPDOWN DEL BOTON AGREGAR-->
        <!--DEMAS BOTONES-->
        <li class="nav-item">
          <a class="nav-link" href="#">Cambiar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Borrar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Cerrar Sesión</a>
        </li>
      </ul>
      <!--FIN DEL GRUPO BOTONES-->
    </div>
    <!--FIN DEL CONTENIDO DEL TOGGLE-->
  </nav>
  <!--FIN DEL NAVBAR-->
  <!--INICIO DEL TABLE-->
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">MATERIAL</th>
      <th scope="col">CANTIDAD</th>
      <th scope="col">DOMINGO</th>
      <th scope="col">LUNES</th>
      <th scope="col">MARTES</th>
      <th scope="col">MIERCOLES</th>
      <th scope="col">JUEVES</th>
      <th scope="col">VIERNES</th>
      <th scope="col">SABADO</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Material 1</td>
      <td>Cantidad 1</td>
      <td>Numero D</td>
      <td>Numero L</td>
      <td>Numero M</td>
      <td>Numero M</td>
      <td>Numero J</td>
      <td>Numero V</td>
      <td>Numero S</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Material 2</td>
      <td>Cantidad 2</td>
      <td>Numero D</td>
      <td>Numero L</td>
      <td>Numero M</td>
      <td>Numero M</td>
      <td>Numero J</td>
      <td>Numero V</td>
      <td>Numero S</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Material 3</td>
      <td>Cantidad 3</td>
      <td>Numero D</td>
      <td>Numero L</td>
      <td>Numero M</td>
      <td>Numero M</td>
      <td>Numero J</td>
      <td>Numero V</td>
      <td>Numero S</td>
    </tr>
  </tbody>
</table>
</div>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="../js/main.js"></script>
</body>
</html>