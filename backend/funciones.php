<?php

if($_POST){

    include '../backend/conexion.php';

    switch ($_POST['action']){
      case "insertar_cat":
        insertar_cat();
      break;


      }
}

function insertar_cat(){

    include '../backend/conexion.php';
    //print_r($_POST);
    //echo("insertar!");
    $nomCat = $_POST['nomCat'];
    $consulta = mysqli_query($conn,"INSERT INTO categorias (cat_nombre) VALUES ($nomCat)");

    if($consulta){
        echo ("insertar!");
    }else{
        echo ("no se inserto");
    }

}

?>