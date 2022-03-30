<?php
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/menu.css">
    <title>Servicios</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h1 class="titulo">Seleccione un Servicio</h1>
        </div>
        
        <div class="row">
            <div class="col grupobotones">
                <h4 class="subtitulos">PEDIATRIA</h4>
                <button class="btn btn-secondary d-block botones">Lactantes</button>
                <button class="btn btn-secondary d-block botones">Escolares</button>
                <button class="btn btn-secondary d-block botones">C.I</button>
                <button class="btn btn-secondary d-block botones">UCIN</button>
            </div>
            <!--<div class="col grupobotones">
                <h4 class="subtitulos"></h4>
                <button class="btn btn-secondary d-block botones">Quirofano</button>
                <button class="btn btn-secondary d-block botones">Labor</button>
                <button class="btn btn-secondary d-block botones">Expulsión</button>
                <button class="btn btn-secondary d-block botones">Hospital</button>
            </div>-->
            <div class="col grupobotones">
                <h4 class="subtitulos">TOCOCIRUGIA</h4>
                <button class="btn btn-secondary d-block botones">Labor</button>
                <button class="btn btn-secondary d-block botones">Expulsion</button>
                <button class="btn btn-secondary d-block botones">Qx Urgencias</button>
                <button class="btn btn-secondary d-block botones">Qx Programadas</button>
                <button class="btn btn-secondary d-block botones">Recuperacion</button>
            </div>
        </div>
        <div class="row">
        <button class="btn btn-primary d-block botones adm">
            <a href="<?php echo '../back/categorias.php';?>">ADMINISTRAR</a>
        </button>
        <button class="btn btn-danger d-block botones salir">
            <a href="<?php echo '../backend/salir.php';?>">SALIR</a>
        </button>
        </div>

        <div class="pie row">
            <h6 class="titulo">Elaboración: De Lucio Mendoza Melanie Vianney, Chi Burgos Rodrigo Ivan & Cornelio Hernandez Erick Sebastian</h6>
            
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
