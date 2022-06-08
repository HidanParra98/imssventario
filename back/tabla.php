<?php
include '../backend/conexion.php';
//include '../backend/funciones.php';

session_start();
    $usuario = $_SESSION['username'];
    
    if(!isset($usuario)){
        header("location: ../index.html");
    }
  
  $consult = mysqli_query($conn,"SELECT numero FROM temp WHERE id = 1");
  $fil = mysqli_fetch_array($consult);
  $idS = $fil['numero'];

  $consulta = mysqli_query($conn,"SELECT ser_id, ser_nom FROM servicios WHERE ser_id = '$idS'");
  $fila = mysqli_fetch_array($consulta);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/tabla.css">
    <link rel="stylesheet" href="../css/tablaP.css" media="print">
    <title>Inventario</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" defer></script>
</head>
<body>
<div class="container-fluid padre">
  <!--NAVBAR-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <h1 id="tabServ"class="navbar-brand" data-id="<?php echo ($fila['ser_id']); ?>"><?php echo strtoupper($fila['ser_nom']); ?></h1>
    <!--CALENDARIO-->
    <form class="form-inline my-2 my-lg-0">
      <?php 
        date_default_timezone_set('America/Cancun');
        $fecha = date("Y-m-d");    
      ?>
      <!--<input class="form-control mr-sm-2" <?php //id="fecha" ?> type="date" value="<?php //echo $fecha;?>">-->
    </form>
    <!--BOTON TOGGLER-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!--DIV DE CONTENIDO PARA EL TOGGLER-->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!--GRUPO DE BOTONES-->
      <ul class="navbar-nav mr-auto">
        <!--DEMAS BOTONES-->
        <li class="nav-item">
          <a class="nav-link" href="<?php echo '../back/menu.php';?>">Menu Principal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="imprimir" href="#">Imprimir</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo '../backend/salir.php';?>">Cerrar Sesión</a>
        </li>
      </ul>
      <!--FIN DEL GRUPO BOTONES-->
    </div>
    <!--FIN DEL CONTENIDO DEL TOGGLE-->
  </nav>
  <!--FIN DEL NAVBAR-->
  <!--INICIO DEL TABLE-->
  <table class="table table-bordered">
  <thead>
    <div class="encabezado">
        <div class="imgEnc">
          <img class="img-fluid" id="imss" src="../assets/imsslogo.png" alt="">
        </div>
        <div class="datosEnc">
          <p><strong>INSTITUTO MEXICANO DEL SEGURO SOCIAL</strong></p>
          <p><strong>HOSPITAL DE GINECOPEDIATRIA No.7</strong></h3>
          <p><strong>RECEPCION Y ENTREGA DE MATERIAL</strong></p>
        </div>
        <div class="imgGob">
          <img class="img-fluid" id="gob"src="../assets/monitos.jpeg" alt="gob">
        </div>
    </div>
    <tr class="colMat"> 
      <th scope="col">#<br></th>
      <th scope="col" id="mat">MATERIAL</th>
      <th scope="col" id="can">CANT</th>
      <th scope="col" class="dcontenedor" data-fecha="a" id="dom">&#8192;
        <table class="hinterno">
          <tr>
            <td>M</td>
            <td>V</td>
            <td>N</td>
          </tr>
        </table>
      </th>
      <th scope="col" class="dcontenedor" data-fecha="b" id="lun">
        <table class="hinterno">
          <tr>
            <td>M</td>
            <td>V</td>
            <td>N</td>
          </tr>
        </table>
      </th>
      <th scope="col" class="dcontenedor" data-fecha="c" id="mar">
        <table class="hinterno">
          <tr>
            <td>M</td>
            <td>V</td>
            <td>N</td>
          </tr>
        </table>
      </th>
      <th scope="col" class="dcontenedor" data-fecha="d" id="mie">
        <table class="hinterno">
          <tr>
            <td>M</td>
            <td>V</td>
            <td>N</td>
          </tr>
        </table>
      </th>
      <th scope="col" class="dcontenedor" data-fecha="e" id="jue">
        <table class="hinterno">
          <tr>
            <td>M</td>
            <td>V</td>
            <td>N</td>
          </tr>
        </table>
      </th>
      <th scope="col" class="dcontenedor" data-fecha="f" id="vie">
        <table class="hinterno">
          <tr>
            <td>M</td>
            <td>V</td>
            <td>N</td>
          </tr>
        </table>
      </th>
      <th scope="col" class="dcontenedor" data-fecha="g" id="sab">
        <table class="hinterno">
          <tr>
            <td>M</td>
            <td>V</td>
            <td>N</td>
          </tr>
        </table>
      </th>
    </tr>
  </thead>
  <tbody id="tbod">
    <?php
      $consulta1 = mysqli_query($conn,"SELECT mat_id, mat_cantper, mat_nom FROM materiales WHERE mat_serv = '$idS'");
      
      $i=1;
      $j=0;
      while($fila1 = mysqli_fetch_array($consulta1)){
      $var = $fila1["mat_id"];
      
    ?>
    <tr class="filaMat" id="<?php echo $fila1["mat_id"];?>" data-id="<?php echo $fila1["mat_id"];?>">
      <th class="num" scope="row"><?php echo $i;?></th>
      <td class="nom"><?php echo $fila1["mat_nom"];?></td>
      <th><?php echo $fila1["mat_cantper"];?></th>
      <td class="cantDom cinterno" data-fecha="">
        <table class="interno">
          <td></td>
          <td></td>
          <td></td>
        </table>
      </td>
      <td class="cantLun cinterno" data-fecha="">
        <table class="interno">
          <td></td>
          <td></td>
          <td></td>
        </table>
      </td>
      <td class="cantMar cinterno" data-fecha="">
        <table class="interno">
          <td></td>
          <td></td>
          <td></td>
        </table>
      </td>
      <td class="cantMie cinterno" data-fecha="">
        <table class="interno">
          <td></td>
          <td></td>
          <td></td>
        </table>
      </td>
      <td class="cantJue cinterno" data-fecha="">
        <table class="interno">
          <td></td>
          <td></td>
          <td></td>
        </table>
      </td>
      <td class="cantVie cinterno" data-fecha="">
        <table class="interno">
          <td></td>
          <td></td>
          <td></td>
        </table>
      </td>
      <td class="cantSab cinterno" data-fecha="">
        <table class="interno">
          <td></td>
          <td></td>
          <td></td>
        </table>
      </td>
    </tr>
    <?php
      $i++;
      }
    ?>
    <tr class="filafirmas">
      <th></th>
      <th><h3>E.G FIRMA Y MATRICULA</h3></th>
      <td class="turnos">
        <table class="finterno" >
          <tr><th>TM</th></tr>
          <tr><th>TV</th></tr>
          <tr><th>TN</th></tr>
        </table>
      </td>
      <td class="turnos">
        <table class="finterno" >
          <tr><th></th></tr>
          <tr><th></th></tr>
          <tr><th></th></tr>
        </table>
      </td>
      <td class="turnos">
        <table class="finterno" >
          <tr><th></th></tr>
          <tr><th></th></tr>
          <tr><th></th></tr>
        </table>
      </td>
      <td class="turnos">
        <table class="finterno" >
          <tr><th></th></tr>
          <tr><th></th></tr>
          <tr><th></th></tr>
        </table>
      </td>
      <td class="turnos">
        <table class="finterno" >
          <tr><th></th></tr>
          <tr><th></th></tr>
          <tr><th></th></tr>
        </table>
      </td>
      <td class="turnos">
        <table class="finterno" >
          <tr><th></th></tr>
          <tr><th></th></tr>
          <tr><th></th></tr>
        </table>
      </td>
      <td class="turnos">
        <table class="finterno" >
          <tr><th></th></tr>
          <tr><th></th></tr>
          <tr><th></th></tr>
        </table>
      </td>
      <td class="turnos">
        <table class="finterno" >
          <tr><th></th></tr>
          <tr><th></th></tr>
          <tr><th></th></tr>
        </table>
      </td>
    </tr>
  </tbody>
</table>
</div>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="../js/main.js"></script>
</body>

</html>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Asignar una cantidad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="cantidad" class="col-form-label">Cantidad:</label>
            <input type="text" class="form-control" id="cantidad">
          </div>
          <div class="form-group">
            <span id="datos" data-action="" data-servicio="" data-columna="" data-fila="" data-id=""></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" id="guardarCant" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal  de Carga-->
<div class="modal fade" id="modalCarga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CARGANDO...</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>SEA PACIENTE SE ESTAN OBTENIENDO LOS DATOS... :D</p>
        <p>(Esta ventana se cerrara automaticamente)</p>
      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>-->
        <!--<button type="button" class="btn btn-primary"></button>-->
      </div>
    </div>
  </div>
</div>