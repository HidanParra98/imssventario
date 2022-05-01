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
        case "insertar_serv":
            insertar_serv();
        break;
        case "borrar_serv":
            borrar_serv();
        break;
        case "consultar_serv":
            consultar_serv();
        break;
        case "editar_serv":
            editar_serv();
        break;
        case "insertar_mat":
            insertar_mat();
        break;
        case "borrar_mat":
            borrar_mat();
        break;
        case "consultar_mat":
            consultar_mat();
        break;
        case "editar_mat":
            editar_mat();
        break;
        case "setear_fechas":
            setear_fechas();
        break;
        case "tabla_servicios":
            tabla_servicios();
        break;

      }
}

/*
||||||||||||||||||||||||||||||||||
||||||| C A T E G O R I A S|||||||
||||||||||||||||||||||||||||||||||
*/

function insertar_cat(){

    include '../backend/conexion.php';
    extract($_POST);
    
    //print_r($_POST);
    $consulta = mysqli_query($conn,"INSERT INTO categorias (cat_nombre) VALUES ('$nomCat')");

    if($consulta){
        echo ("insertar!");
    }else{
        echo ("no se inserto");
    }

}

function editar_cat(){
    include '../backend/conexion.php'; 
    extract($_POST);
    //print_r($_POST);  
    $consulta = mysqli_query($conn,"UPDATE categorias SET cat_nombre = '$nomCat' WHERE cat_id = $idCat");

    if($consulta){
        echo("editar!");
    }else{
        echo("error");
    }
    
}

function consultar_cat(){
    include '../backend/conexion.php';
    extract($_POST);
    //print_r($_POST);
    //$id = $_POST['id'];
    $consulta = mysqli_query($conn,"SELECT cat_nombre FROM categorias WHERE cat_id = $idCat");

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
    extract($_POST);
    //print_r($_POST);

    $consulta = mysqli_query($conn,"DELETE FROM categorias WHERE cat_id = $idCat");

    if($consulta){
        echo ("borrar!");
    }else{
        echo ("no se borro");
    }

}

//|||||||||||||||||||||||||||||||||||
//||||| S E R V I C I O S |||||||||||
//|||||||||||||||||||||||||||||||||||

function insertar_serv(){
    include '../backend/conexion.php';
    //print_r($_POST);
    extract($_POST);

    $consulta = mysqli_query($conn,"INSERT INTO servicios (ser_cat,  ser_nom) VALUES ('$listaCat', '$nomServ')");


    if($consulta){
        echo ("insertar!");
    }else{
        echo ("no se inserto");
    }
}

function editar_serv(){
    include '../backend/conexion.php'; 
    extract($_POST);
    //print_r($_POST);  
    $consulta = mysqli_query($conn,"UPDATE servicios SET ser_cat = '$listaCat', ser_nom = '$nomServ' WHERE ser_id = $idServ");

    if($consulta){
        echo("editar!");
    }else{
        echo("error");
    }

}

function consultar_serv(){
    include '../backend/conexion.php';
    extract($_POST);
    //print_r($_POST);
    
    $consulta = mysqli_query($conn,"SELECT ser_cat, ser_nom FROM servicios WHERE ser_id = $idServ");

    /*if($consulta){
        echo ("consulta!");
    }else{
        echo ("consulta");
    }*/

    if($consulta->num_rows > 0){
        $info = $consulta->fetch_assoc();
        $data['info'] = $info;
    }else{
        echo("error");
    }
    echo json_encode($data);
}



function borrar_serv(){
    include '../backend/conexion.php';
    extract($_POST);
    //print_r($_POST);

    $consulta = mysqli_query($conn,"DELETE FROM servicios WHERE ser_id = $idServ");

    if($consulta){
        echo ("borrar!");
    }else{
        echo ("no se borro");
    }

}

/*
||||||||||||||||||||||||||||||||||
||||| M A T E R I A L E S ||||||||
||||||||||||||||||||||||||||||||||
*/

function insertar_mat(){
    include '../backend/conexion.php';
    //print_r($_POST);
    extract($_POST);

    $consulta = mysqli_query($conn,"INSERT INTO materiales (mat_serv,  mat_nom, mat_cantper) VALUES ('$listaServ', '$nomMat', '$cantMat')");

    if($consulta){
        echo ("insertar!");
    }else{
        echo ("no se inserto");
    }
}

function borrar_mat(){
    include '../backend/conexion.php';
    extract($_POST);
    //print_r($_POST);

    $consulta = mysqli_query($conn,"DELETE FROM materiales WHERE mat_id = $idMat");

    if($consulta){
        echo ("borrar!");
    }else{
        echo ("no se borro");
    }
}

function editar_mat(){
    include '../backend/conexion.php';
    extract($_POST);

    $consulta = mysqli_query($conn,"UPDATE materiales SET mat_serv = '$listaServ', mat_nom = '$nomMat', mat_cantper = '$cantMat' WHERE mat_id = $idMat");

    if($consulta){
        echo("editar!");
    }else{
        echo("error");
    }

}

function consultar_mat(){
    include '../backend/conexion.php';
    extract($_POST);
    //print_r($_POST);
    
    $consulta = mysqli_query($conn,"SELECT mat_serv, mat_nom, mat_cantper FROM materiales WHERE mat_id = $idMat");

    /*if($consulta){
        echo ("consulta!");
    }else{
        echo ("consulta");
    }*/

    if($consulta->num_rows > 0){
        $info = $consulta->fetch_assoc();
        $data['info'] = $info;
    }else{
        echo("error");
    }
    echo json_encode($data);
}

/*
||||||||||||||||||||||||||||||
|||||||| F E C H A S |||||||||
||||||||||||||||||||||||||||||
*/

function setear_fechas($fecha){
    //print_r($_POST);
    //extract($_POST);
    $dSemana = date("w", strtotime($fecha)); //OBTENEMOS EL NUMERO DE DIA DE LA SEMANA
    switch ($dSemana){//EN BASE AL NUMERO DEL DIA SABREMOS QUE DIA DE LA SEMANA ES:
        case 0:
            //echo("DOMINGO: $fecha");
            $fecha = strtotime('-1 day', strtotime($fecha)); //CALCULAMOS EL SABADO DELA SEMANA ANTERIOR
            $fechar = date($fecha);//CONVERTIMOS EL STRING A FORMATO DATE
            
            $ar = arrayfechas($fechar);
            return $ar;
            
        break;
        case 1:
            //echo("LUNES: $fecha");
            $fecha = strtotime('-2 day', strtotime($fecha));
            $fechar = date($fecha);
            
            $ar = arrayfechas($fechar);
            return $ar;

        break;
        case 2:
            //echo ("MARTES: $fecha");
            $fecha = strtotime('-3 day', strtotime($fecha));
            $fechar = date($fecha);
            
            $ar = arrayfechas($fechar);
            return $ar;

        break;
        case 3:
            //echo ("MIERCOLES: $fecha");
            $fecha = strtotime('-4 day', strtotime($fecha));
            $fechar = date($fecha);
            
            $ar = arrayfechas($fechar);
            return $ar;

        break;
        case 4:
            //echo ("JUEVES: $fecha");
            $fecha = strtotime('-5 day', strtotime($fecha));
            $fechar = date($fecha);
            
            $ar = arrayfechas($fechar);
            return $ar;

        break;
        case 5:
            //echo ("VIERNES: $fecha");
            $fecha = strtotime('-6 day', strtotime($fecha));
            $fechar = date($fecha);
            
            $ar = arrayfechas($fechar);//creamos una variable para la función procesada
            return $ar;//retornamos la variable

        break;
        case 6:
            //echo ("SABADO: $fecha");
            $fecha = strtotime('-7 day', strtotime($fecha));
            $fechar = date($fecha);
            
            $ar = arrayfechas($fechar);
            return $ar;
            
        break;


    }

}

function arrayfechas($cadena){
    $diasSemana = ['dom','lun','mar', 'mie', 'jue', 'vie', 'sab'];
    $fechasSemana = array(); //array para guardar las fechas
    $data = array();
    $j = 0;  //variable para llenar el array
    $fecha = date("Y-m-d", $cadena);
    for($i=1;$i<8;$i++){

        $dia = strtotime("+ $i day", strtotime($fecha));//Sumamos el recorrido del ciclo a la fecha del sabado pasado
        $dias = date('d-m-y', $dia);//Formateamos a String

        $fechasSemana[$j] = $dias; // llenar el array desde la pocision 0
        $j++; //aumentar j
        
    }
    $data = array_combine($diasSemana,$fechasSemana);//combinar para hacer array asociativo y facilitar busquedas
    
    return $data;//retornamos el array asociativo
}

/*
||||||||||||||||||||||||||||||
||||||||| T A B L A ||||||||||
||||||||||||||||||||||||||||||
*/

function tabla_servicios(){
    extract($_POST);
    $data = setear_fechas($fecha);//variable para guardar el return

    echo json_encode($data);//imprimir variable codificada en json
}

?>