<?php
include '../backend/conexion.php';

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admon.css">
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
        <li class="nav-item active">
          <a class="nav-link" href="#">CATEGORIAS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo '../back/servicios.php';?>">SERVICIOS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo '../back/materiales.php';?>">MATERIALES</a>
        </li>
        <li class="nav-item">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCategorias">NUEVO</button>
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
          <th scope="col">NOMBRE</th>
          <th scope="col">ACCION</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $consulta = mysqli_query($conn,"SELECT * FROM categorias");
    $i=1;
    while($fila = mysqli_fetch_array($consulta)){
    ?>
        <tr id="<?php echo $fila["cat_id"];?>">
          <th scope="row"><?php echo $i?></th>
          <td><?php echo $fila["cat_nombre"]?></td>
          <td>
            <button type="button" id="btnEditar" class="btn btn-info" data-toggle="modal" data-target="#modalCategorias">Editar</button>
            <button type="button" class="btn btn-danger">Borrar</button></td>
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
    <script src="../js/main.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

<!--MODAL-->

<div class="modal fade" id="modalCategorias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Creando nueva categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="nombreCategoria" class="col-form-label">Nombre de la Categoria:</label>
            <input type="text" class="form-control" id="nombreCategoria">
          </div>
          <div class="form-group">
            <p>(Una categoria es un grupo de Servicios).</p>
            <h5 class="text-danger"id="alerta"></h5>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarCat">Guardar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabe" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabe">Editando categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="editCategoria" class="col-form-label">Nombre de la Categoria:</label>
            <input type="text" class="form-control" id="editCategoria">
          </div>
          <div class="form-group">
            <p>(Una categoria es un grupo de Servicios).</p>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnEditCat">Guardar</button>
      </div>
    </div>
  </div>
</div>