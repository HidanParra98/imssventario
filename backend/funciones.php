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
        case "insertar_cant":
            insertar_cant();
        break;
        case "editar_cant":
            editar_cant();
        break;
        case "consultar_cant":
            consultar_cant();
        break;
        case "eliminar_cant":
            eliminar_cant();
        break;
        case "consultar_cantxfecha":
            consultar_cantxfecha();
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
        $dias = date('Y-m-d', $dia);//Formateamos a String

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
    //print_r($_POST);
    extract($_POST);
    $data = setear_fechas($fecha);

    echo json_encode($data);//imprimir variable codificada en json*/
    
}

function consultar_cantxfecha(){
    include '../backend/conexion.php';

    extract($_POST);
    $data = setear_fechas($fecha);
    extract($data);

    $cantidades='';

    $consulta1 = mysqli_query($conn,"SELECT mat_id, mat_cantper, mat_nom FROM materiales WHERE mat_serv = '$idSer'");
    $i=1;
    $j=0;

    while($fila1 = mysqli_fetch_array($consulta1)){
        $var = $fila1["mat_id"];
        $conDom = mysqli_query($conn,"SELECT reg_id, reg_cant FROM registros WHERE reg_fecha = '$dom' AND reg_mat = $var");
        $cDom = mysqli_fetch_array($conDom);
        $conLun = mysqli_query($conn,"SELECT reg_id, reg_cant FROM registros WHERE reg_fecha = '$lun' AND reg_mat = $var");
        $cLun = mysqli_fetch_array($conLun);
        $conMar = mysqli_query($conn,"SELECT reg_id, reg_cant FROM registros WHERE reg_fecha = '$mar' AND reg_mat = $var");
        $cMar = mysqli_fetch_array($conMar);
        $conMie = mysqli_query($conn,"SELECT reg_id, reg_cant FROM registros WHERE reg_fecha = '$mie' AND reg_mat = $var");
        $cMie = mysqli_fetch_array($conMie);
        $conJue = mysqli_query($conn,"SELECT reg_id, reg_cant FROM registros WHERE reg_fecha = '$jue' AND reg_mat = $var");
        $cJue = mysqli_fetch_array($conJue);
        $conVie = mysqli_query($conn,"SELECT reg_id, reg_cant FROM registros WHERE reg_fecha = '$vie' AND reg_mat = $var");
        $cVie = mysqli_fetch_array($conVie);
        $conSab = mysqli_query($conn,"SELECT reg_id, reg_cant FROM registros WHERE reg_fecha = '$sab' AND reg_mat = $var");
        $cSab = mysqli_fetch_array($conSab);


        $idDom = isset($cDom["reg_id"]) ? $cDom["reg_id"] : NULL;
        $idLun = isset($cLun["reg_id"]) ? $cLun["reg_id"] : NULL;
        $idMar = isset($cMar["reg_id"]) ? $cMar["reg_id"] : NULL;
        $idMie = isset($cMie["reg_id"]) ? $cMie["reg_id"] : NULL;
        $idJue = isset($cJue["reg_id"]) ? $cJue["reg_id"] : NULL;
        $idVie = isset($cVie["reg_id"]) ? $cVie["reg_id"] : NULL;
        $idSab = isset($cSab["reg_id"]) ? $cSab["reg_id"] : NULL;

        
        $vDom = isset($cDom["reg_cant"]) ? $cDom["reg_cant"] : "Sin Datos";
        $vLun = isset($cLun["reg_cant"]) ? $cLun["reg_cant"] : "Sin Datos";
        $vMar = isset($cMar["reg_cant"]) ? $cMar["reg_cant"] : "Sin Datos";
        $vMie = isset($cMie["reg_cant"]) ? $cMie["reg_cant"] : "Sin Datos";
        $vJue = isset($cJue["reg_cant"]) ? $cJue["reg_cant"] : "Sin Datos";
        $vVie = isset($cVie["reg_cant"]) ? $cVie["reg_cant"] : "Sin Datos";
        $vSab = isset($cSab["reg_cant"]) ? $cSab["reg_cant"] : "Sin Datos";

        $cantidades .= '<tr class="filaMat" id="'.$fila1['mat_id'].'">
                            <th scope="row">'.$i.'</th>
                            <td>'.$fila1['mat_nom'].'</td>
                            <th>'.$fila1['mat_cantper'].'</th>
                            <td class="cantDom" data-id="'.$idDom.'" data-fecha="'.$dom.'">'.$vDom.'</td>
                            <td class="cantLun" data-id="'.$idLun.'" data-fecha="'.$lun.'">'.$vLun.'</td>
                            <td class="cantMar" data-id="'.$idMar.'" data-fecha="'.$mar.'">'.$vMar.'</td>
                            <td class="cantMie" data-id="'.$idMie.'" data-fecha="'.$mie.'">'.$vMie.'</td>
                            <td class="cantJue" data-id="'.$idJue.'" data-fecha="'.$jue.'">'.$vJue.'</td>
                            <td class="cantVie" data-id="'.$idVie.'" data-fecha="'.$vie.'">'.$vVie.'</td>
                            <td class="cantSab" data-id="'.$idSab.'" data-fecha="'.$sab.'">'.$vSab.'</td>
                        </tr>';
      
      $i++;
    }
    //$send = array($cantidades,$data);
    echo json_encode($cantidades,JSON_UNESCAPED_UNICODE);
    //echo json_encode($data);
}



function insertar_cant(){
    include '../backend/conexion.php';
    //echo("insertar");
    print_r($_POST);
    extract($_POST);

    /*$consulta = mysqli_query($conn,"INSERT INTO registros (reg_mat, reg_serv, reg_cant, reg_fecha) VALUES ('$servicio', '$fila','$cantidad','$columna')");

    
    if($consulta){
        echo ("insertar!");
    }else{
        echo ("no se inserto");
    }*/

    echo 'insertar!';
}

function editar_cant(){
    include '../backend/conexion.php';
    //echo("editar");
    print_r($_POST);
    extract($_POST);

    echo 'editar!';

}

function eliminar_cant(){
    include '../backend/conexion.php';
    echo("eliminar");
    print_r($_POST);
    extract($_POST);

}
function consultar_cant(){
    include '../backend/conexion.php';
    echo("consultar");
    print_r($_POST);
    extract($_POST);

}
?>