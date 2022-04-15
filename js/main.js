$(document).ready(function(){

/*
||||||||||||||||||||||||||||||
||||| C A T E G O R I A S|||||
||||||||||||||||||||||||||||||
*/
    $("#guardarCat").click(function(){
        let nomCat = $("#nombreCategoria").val();
        let action = 'insertar_cat';
        let obj = {
            nomCat: nomCat,
            action: action
        }


        if($(this).data("actualizar")==1){
            obj["action"] = 'editar_cat';
            obj["idCat"] = $(this).data("id");
            //console.log(idCat);
            $(this).removeData("actualizar").removeData("id");
        }

        //alert(Object.values(obj));
        if(nomCat==""){
            alert("Escribe un nombre!");
        }
        else{
            $.ajax({
                url: "../backend/funciones.php",
                type: "POST",
                async: true,
                data: obj,
                success: function(response){
                    console.log(response);
                    location.reload();
                }
            })
        }  
    }); 

    $(".editarCat").click(function(){
        let idCat = $(this).data("id");
        let action = 'consultar_cat';
        let obj = {
            idCat : idCat,
            action : action
        }

        $.ajax({
            url: "../backend/funciones.php",
            type: "POST",
            async: true,
            dataType: "json",
            data: obj, 
            success: function(data){
                //console.log(data);
                //console.log(response);
                $('#nombreCategoria').val(data.info.cat_nombre);
            }
        })
        
        $("#guardarCat").text("Actualizar").data("actualizar", 1).data("id",idCat);
        $(".modal-title").text("Editar Categoria");
        $("#modal").modal("show");

    });

    $(".borrarCat").click(function(){
        let idCat = $(this).data("id");
        let action = 'borrar_cat';
        let obj = {
            idCat : idCat,
            action : action
        }
        //alert(idCat);
        $.ajax({
            url: "../backend/funciones.php",
            type: "POST",
            async: true,
            data: obj, 
            success: function(response){
                console.log(response);
                location.reload();
            }
        })

    });

/*
|||||||||||||||||||||||||||
|||| S E R V I C I O S ||||
|||||||||||||||||||||||||||
*/

    $("#guardarServ").click(function(){
        let nomServ = $("#nomServ").val();
        let listaCat= $("#listaCat").val();
        let action = 'insertar_serv';
        let obj = {
            nomServ: nomServ,
            listaCat: listaCat,
            action: action
        }

        if($(this).data("actualizar2")==1){
            obj["action"] = 'editar_serv';
            obj["idServ"] = $(this).data("id");
            //console.log(idServ);
            $(this).removeData("actualizar2").removeData("id");
        }

        if(nomServ=="" || listaCat==0){
            alert("Escribe un nombre o seleccione una categoria!");
        }
        else{
            $.ajax({
                url: "../backend/funciones.php",
                type: "POST",
                async: true,
                data: obj,
                success: function(response){
                    console.log(response);
                    location.reload();
                }
            })
        }
    });

    $(".editarServ").click(function(){
        let idServ = $(this).data("id");
        let action = 'consultar_serv';
        let obj = {
            idServ : idServ,
            action : action
        }
        //alert("d");

        $.ajax({
            url: "../backend/funciones.php",
            type: "POST",
            async: true,
            dataType: "json",
            data: obj, 
            success: function(data){
                //console.log(data);
                //console.log(response);
                $('#listaCat').val(data.info.ser_cat);
                $('#nomServ').val(data.info.ser_nom);
            }
        })
        
        $("#guardarServ").text("Actualizar").data("actualizar2", 1).data("id",idServ);
        $(".modal-title").text("Editar Servicio");
        $("#modalS").modal("show");

    });


    $(".borrarServ").click(function(){
        let idServ = $(this).data("id");
        let action = 'borrar_serv';
        let obj = {
            idServ : idServ,
            action : action
        }
        //alert(idServ);
        $.ajax({
            url: "../backend/funciones.php",
            type: "POST",
            async: true,
            data: obj, 
            success: function(response){
                console.log(response);
                location.reload();
            }
        })

    });

/*
|||||||||||||||||||||||||||||
|||| M A T E R I A L E S ||||
|||||||||||||||||||||||||||||
*/

    $("#guardarMat").click(function(){
        let nomMat = $("#nomMat").val();
        let listaServ= $("#listaServ").val();
        let cantMat = $("#cantMat").val();
        let action = 'insertar_mat';
        let obj = {
            nomMat : nomMat,
            listaServ : listaServ,
            cantMat : cantMat,
            action : action
        }

        if($(this).data("actualizar3")==1){
            obj["action"] = 'editar_mat';
            obj["idMat"] = $(this).data("id");
            //console.log(idServ);
            $(this).removeData("actualizar3").removeData("id");
        }

        if(nomMat=="" || listaServ==0 || cantMat==""){
            alert("Escribe un nombre, agrega una cantidad o seleccione un servicio!");
        }
        else{
            $.ajax({
                url: "../backend/funciones.php",
                type: "POST",
                async: true,
                data: obj, 
                success: function(response){
                    console.log(response);
                    location.reload();
                }
            })
        }
    });

    $(".editarMat").click(function(){
        let idMat = $(this).data("id");
        let action = 'consultar_mat';
        let obj = {
            idMat : idMat,
            action : action
        }
        //alert("d");

        $.ajax({
            url: "../backend/funciones.php",
            type: "POST",
            async: true,
            dataType: "json",
            data: obj, 
            success: function(data){
                //console.log(data);
                //console.log(response);
                $('#listaServ').val(data.info.mat_serv);
                $('#nomMat').val(data.info.mat_nom);
                $('#cantMat').val(data.info.mat_cantper);
            }
        })
        
        $("#guardarMat").text("Actualizar").data("actualizar3", 1).data("id",idMat);
        $(".modal-title").text("Editar Material");
        $("#modalM").modal("show");

    });

    $(".borrarMat").click(function(){
        let idMat = $(this).data("id");
        let action = 'borrar_mat';
        let obj = {
            idMat : idMat,
            action : action
        }
        //alert(idServ);
        $.ajax({
            url: "../backend/funciones.php",
            type: "POST",
            async: true,
            data: obj, 
            success: function(response){
                console.log(response);
                location.reload();
            }
        })

    });

/*
||||||||||||||||||||||||||||||
|||||||| F E C H A S |||||||||
||||||||||||||||||||||||||||||
*/

    $("#fecha").change(function(){
        let fecha = $("#fecha").val();
        let action = 'setear_fechas';
        let obj = {
            fecha : fecha,
            action : action
        }
        $.ajax({
            url: "../backend/funciones.php",
            type: "POST",
            async: true,
            data: obj, 
            success: function(response){
                console.log(response);
                //location.reload();
            }
        })
        //console.log(fecha);
    });


})