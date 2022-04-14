$(document).ready(function(){

    //CATEGORIAS
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
                console.log(data);
                //console.log(response);
                $('#nombreCategoria').val(data.info.cat_nombre);
            }
        })
        
        $("#guardarCat").text("Actualizar").data("actualizar", 1).data("id",idCat);
        $(".modal-title").text("Editar Usuario");
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




})