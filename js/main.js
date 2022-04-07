$(document).ready(function(){

    //CATEGORIAS
    $("#guardarCat").click(function(){
        let nomCat = $("#nombreCategoria").val();
        let action = 'insertar_cat';

        /*if($(this).data("edicion")==1){
            obje["action"] = "editar_cat";
            obje["id"] = $(this).data("id");
            $(this).removeData("edicion").removeData("id");
        }*/

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
                }
            })
            location.reload();
        }  
    }); 

    $(".editarCat").click(function(){
        /*let idCat = $(this).data("id");
        let action = 'consultar_cat';*/

        obje = {
            'action' : 'consultar_cat',
            'id' : $(this).data("id"),
        }
        
        /*$.post("../backend/funciones.php", obje, function(data){
            $("#nombreCategoria").val(data.cat_nombre);

        },"JSON");*/
        
        $("#guardarCat").text("Actualizar").data("edicion", 1).data("id", id);
        $(".modal-title").text("Editar Usuario");
        $("#modal").modal('show');

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
            }
        })
        location.reload();

    });




})