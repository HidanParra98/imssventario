<?php
include '../backend/conexion.php';

session_start();
    $usuario = $_SESSION['username'];
    
    if(!isset($usuario)){
        header("location: ../index.html");
    }

    //CONSULTA Y VALIDACIÓN PARA EL ACCESO A ESTA PAGINA POR URL
    $consulta = mysqli_query($conn,"SELECT adm_rol FROM admin WHERE adm_usuario = '$usuario'");
    $si=1;
    $no=2;
    $fila = mysqli_fetch_array($consulta);
    if ($fila['adm_rol'] != 1){
      header("location: ../back/menu.php");
    }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/categorias.css">
    <title>Administración</title>
</head>
<body>
<div class="container-fluid padre">
  <!--NAVBAR-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <h1 class="navbar-brand">ADMINISTRAR</h1>
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
          <a class="nav-link" href="<?php echo '../back/menu.php';?>"><strong>MENU PRINCIPAL</strong></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo '../back/categorias.php';?>">CATEGORIAS</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#">SERVICIOS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo '../back/materiales.php';?>">MATERIALES</a>
        </li>
        <li class="nav-item">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalS">NUEVO</button>
        </li>
      </ul>
    </div>
  </nav>
  <!--FIN DEL NAVBAR-->
  <!--INICIO DEL TABLE-->
  <div class="table-responsive">
    <table class="table">
    <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">CATEGORIA</th>
          <th scope="col">SERVICIO</th>
          <th scope="col">ACCION</th>
        </tr>
    </thead>
    <tbody>
    <?php
      $consulta = mysqli_query($conn,"SELECT ser_id, cat_nombre, ser_nom FROM servicios, categorias WHERE ser_cat = cat_id");
      $i=1;
      while($fila = mysqli_fetch_array($consulta)){
    ?>
        <tr id="<?php echo $fila["ser_id"];?>">
          <th scope="row"><?php echo $i?></th>
          <td><?php echo $fila["cat_nombre"]?></td>
          <td><?php echo $fila["ser_nom"]?></td>
          <td>
            <button type="button" data-id="<?php echo $fila["ser_id"];?>" class="btn btn-info editarServ">Editar</button>
            <button type="button" data-id="<?php echo $fila["ser_id"];?>"class="btn btn-danger borrarServ">Borrar</button>
          </td>
        </tr>
    <?php
      $i++;
    }
    ?>
    </tbody>
    </table>
  </div>
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

<!--MODAL 2-->

<div class="modal fade" id="modalS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Creando nuevo servicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="listaCat">Seleccione la categoria a la que pertenecera el servicio</label>
            <select class="form-control" id="listaCat">
              <option value="0">Seleccionar Categoria</option>
              <?php
                $consulta2 = mysqli_query($conn,"SELECT * FROM categorias");
                while ($fila2 = mysqli_fetch_array($consulta2)){
              ?>
              <option value="<?php echo $fila2['cat_id']?>"><?php echo $fila2['cat_nombre']?></option>
              <?php
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="nomServ" class="col-form-label">Nombre del Servicio</label>
            <input type="text" class="form-control" id="nomServ">
          </div>
          <div class="form-group">
            <p>(Un servicio debe ser agregado a una categoria).</p>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="guardarServ">Guardar</button>
      </div>
    </div>
  </div>
</div>
