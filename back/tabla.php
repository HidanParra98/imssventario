<?php
include '../backend/conexion.php';
include '../backend/funciones.php';

session_start();
    $usuario = $_SESSION['username'];
    
    if(!isset($usuario)){
        header("location: ../index.html");
    }

  if($_POST){ 
    extract($_POST);
    $_SESSION['fechaActual'] = $fechaActual;
    $_SESSION['idActual']  = $idActual;
    $_SESSION['nomActual'] = $servActual;

    header("location: ../back/tabla.php");
    
  }
  $idS = $_SESSION['idActual'];
  
  $consulta = mysqli_query($conn,"SELECT ser_id, ser_nom FROM servicios WHERE ser_id = '$idS'");
  $fila = mysqli_fetch_array($consulta);

  $fechaS = $_SESSION['fechaActual'];
  //var_dump($fechaS);
  $data = setear_fechas($fechaS);
  //var_dump($json);
  //echo $data['Domingo'];

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
    <h1 class="navbar-brand"><?php echo strtoupper($fila['ser_nom']); ?></h1>
    <!--CALENDARIO-->
    <form class="form-inline my-2 my-lg-0">
      <?php 
        date_default_timezone_set('America/Cancun');
        $fecha = date("Y-m-d");    
      ?>
      <input class="form-control mr-sm-2" id="fecha" type="date" value="<?php echo $fecha;?>">
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
    <tr class="colMat"> 
      <th scope="col">#<br></th>
      <th scope="col" id="mat">MATERIAL DEL<br>SERVICIO</th>
      <th scope="col" id="can">CANTIDAD<br>PERMITIDA</th>
      <th scope="col" data-fecha="a" id="dom">DOMINGO<br><?php echo $data['dom'];?></th>
      <th scope="col" data-fecha="b" id="lun">LUNES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><?php echo $data['lun'];?></th>
      <th scope="col" data-fecha="c" id="mar">MARTES&nbsp;&nbsp;<br><?php echo $data['mar'];?></th>
      <th scope="col" data-fecha="d" id="mie">MIERCOLES<br><?php echo $data['mie'];?></th>
      <th scope="col" data-fecha="e" id="jue">JUEVES&nbsp;&nbsp;&nbsp;&nbsp;<br><?php echo $data['jue'];?></th>
      <th scope="col" data-fecha="f" id="vie">VIERNES&nbsp;&nbsp;<br><?php echo $data['vie'];?></th>
      <th scope="col" data-fecha="g" id="sab">SABADO&nbsp;&nbsp;&nbsp;<br><?php echo $data['sab'];?></th>
    </tr>
  </thead>
  <tbody>
    <?php
      $consulta1 = mysqli_query($conn,"SELECT mat_id, mat_cantper, mat_nom FROM materiales WHERE mat_serv = '$idS'");
      $i=1;
      while($fila1 = mysqli_fetch_array($consulta1)){
    ?>
    <tr class="filaMat" id="<?php echo $fila1["mat_id"];?>">
      <th scope="row"><?php echo $i;?></th>
      <td><?php echo $fila1["mat_nom"];?></td>
      <td><?php echo $fila1["mat_cantper"];?></td>
      <td class="cantDom" data-fecha="<?php echo $data['dom'];?>">Numero D</td>
      <td class="cantLun" data-fecha="<?php echo $data['lun'];?>">Numero L</td>
      <td class="cantMar" data-fecha="<?php echo $data['mar'];?>">Numero M</td>
      <td class="cantMie" data-fecha="<?php echo $data['mie'];?>">Numero M</td>
      <td class="cantJue" data-fecha="<?php echo $data['jue'];?>">Numero J</td>
      <td class="cantVie" data-fecha="<?php echo $data['vie'];?>">Numero V</td>
      <td class="cantSab" data-fecha="<?php echo $data['sab'];?>">Numero S</td>
    </tr>
    <?php
      $i++;
      }
    ?>
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