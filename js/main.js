$(document).ready(function(){

    //CATEGORIAS
    $("#guardarCat").click(function(){
        let nomCat = $("#nombreCategoria").val();
        let action = 'insertar_cat';

        if($(this).data("actualizar")==1){
            action = 'editar_cat';
            idCat = $(this).data("id");
            
            
            console.log(idCat);
            $(this).removeData("edicion").removeData("id");
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
                data: {
                    action: action,
                    nomCat: nomCat,
                }, 
                success: function(response){
                    console.log(response);
                    location.reload();
                }
            })
            //location.reload();
        }  
    }); 

    $(".editarCat").click(function(){
        let idCat = $(this).data("id");
        let action = 'consultar_cat';

        $.ajax({
            url: "../backend/funciones.php",
            type: "POST",
            async: true,
            dataType: "json",
            data: {
                action: action,
                id: idCat,
            }, 
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
        //alert(idCat);
        $.ajax({
            url: "../backend/funciones.php",
            type: "POST",
            async: true,
            data: {
                action: action,
                id: idCat,
            }, 
            success: function(response){
                console.log(response);
                location.reload();
            }
        })
        //location.reload();

    });




})