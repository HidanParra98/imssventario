<?php

if($_POST){

    include '../backend/conexion.php';

    switch ($_POST['action']){

        case "insertar_cat":
            insertar_cat();
        break;
        case "borrar_cat":
            borrar_cat();
        break;
        case "consultar_cat":
            consultar_cat();
        break;
        case "editar_cat":
            editar_cat();
        break;
        

      }
}

function insertar_cat(){

    include '../backend/conexion.php';
    //print_r($_POST);
    //echo("insertar!");
    $nomCat = $_POST['nomCat'];
    $consulta = mysqli_query($conn,"INSERT INTO categorias (cat_nombre) VALUES ('$nomCat')");

    if($consulta){
        echo ("insertar!");
    }else{
        echo ("no se inserto");
    }

}

function editar_cat(){
    include '../backend/conexion.php'; 
    print_r($_POST);  
    
    
}

function consultar_cat(){
    include '../backend/conexion.php';

    //print_r($_POST);
    $id = $_POST['id'];
    $consulta = mysqli_query($conn,"SELECT cat_nombre FROM categorias WHERE cat_id = $id");

    if($consulta->num_rows > 0){
        $nomCat = $consulta->fetch_assoc();
        $data['info'] = $nomCat;
    }else{
        echo("error");
    }
    echo json_encode($data);
}

function borrar_cat(){
    include '../backend/conexion.php';
    //print_r($_POST);

    $id = $_POST['id'];
    $consulta = mysqli_query($conn,"DELETE FROM categorias WHERE cat_id = $id");

    if($consulta){
        echo ("borrar!");
    }else{
        echo ("no se borro");
    }

}



?>