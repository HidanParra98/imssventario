$(document).ready(function(){
    /*$("#btnEditar").click(function(){
        $("#exampleModalLabel").text("Editando Categoria");
        $("#exampleModalLabel").text("Creando Categoria");
    });    */
    $("#btnGuardarCat").click(function(e){
        e.preventDefault();
        let nomCat=$("#nombreCategoria").val();
        let action = 'insertar_cat';

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
                    //location.reload();
                    $('#tab').load(location.href + " #tab");
                }
            });
            //location.reload();
        }
        
    }); 


    /*$('#sidebarCollapse').on('click',function (){
        $('#sidebar').toggleClass('active');
        //console.log("puto");
    });*/
})