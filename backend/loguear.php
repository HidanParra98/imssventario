<?php
    require 'conexion.php';

    session_start();

    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $query = "SELECT COUNT(*) as contar FROM admin WHERE adm_usuario = '$usuario' and adm_password = '$contrasena'";
    $consulta = mysqli_query($conn,$query);
    $array = mysqli_fetch_array($consulta);

    if($array['contar']>0){
        $_SESSION['username'] = $usuario;
        header("location: ../back/servicios.php");
    }else{
        echo '<script language="javascript">
                alert("No existe el Usuario");
                window.location.href="../index.html";
              </script>';
        //header("location: ../index.html");
    }

?>