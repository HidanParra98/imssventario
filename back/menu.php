<?php
    include '../backend/conexion.php';

    session_start();
    $usuario = $_SESSION['username'];
    //echo ($usuario);
    
    if(!isset($usuario)){
        header("location: ../index.html");
    }

    $consulta = mysqli_query($conn,"SELECT adm_rol FROM admin WHERE adm_usuario = '$usuario'");
    $si=1;
    $no=2;
    $fila = mysqli_fetch_array($consulta);

    
    date_default_timezone_set('America/Cancun');
    $fecha = date("Y-m-d");
    
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
            <span id="fecha" data-fecha="<?php echo $fecha?>"></span>
            <h1 class="titulo">Seleccione un Servicio</h1>
        </div>
        <div class="row">
        <?php
        //OBTENER NOMBRE DE CATEGORIAS Y AUMENTAR i DE ACUERDO A LAS FILAS
            $consulta1 = mysqli_query($conn,"SELECT cat_id, cat_nombre FROM categorias");
            $i=1;
            while($fila1 = mysqli_fetch_array($consulta1)){
        ?>
            <div class="col grupobotones">
                <h4 class="subtitulos" id=""><?php echo $fila1["cat_nombre"];?></h4>
                <?php
                //OBTENER NOMBRE DE SERVICIOS DE ACUERDO A LA CATEGORIA
                    $consulta2 = mysqli_query($conn,"SELECT ser_id, ser_nom FROM servicios WHERE ser_cat = $i");
                    while($fila2 = mysqli_fetch_array($consulta2)){ 
                ?>
                <button type="button" data-id="<?php echo $fila2["ser_id"];?>" class="btn btn-secondary d-block nomSe botones"><?php echo $fila2["ser_nom"];?></button>
                <?php
                    }
                    //FIN DEL SEGUNDO WHILE
                ?>
            </div>
            <?php
                $i++;
                }
                //FIN DEL PRIMER WHILE
            ?>
        </div>
        <div class="row">
        <?php
            if ($fila['adm_rol'] == 1) { 
        ?>
        <button class="btn btn-primary d-block botones adm">
            <a href="<?php echo '../back/categorias.php';?>">ADMINISTRAR</a>
        </button>
        <?php
            }
        ?>
        <button class="btn btn-danger d-block botones salir">
            <a href="<?php echo '../backend/salir.php';?>">SALIR</a>
        </button>
        </div>

        <div class="pie row">
            <h6 class="titulo">Elaboración: De Lucio Mendoza Melanie Vianney, Chi Burgos Rodrigo Ivan & Cornelio Hernandez Erick Sebastian</h6>
            
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
