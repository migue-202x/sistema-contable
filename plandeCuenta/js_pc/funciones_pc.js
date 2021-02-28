


//***********************************************************************************************************************

function functionDeployAuditoriaPC(){ //EL PARAMETRO 'i' CONTIENE EL VALOR DE GENERADO CON ---> new Date().getUTCMilliseconds();
            

                            $.get( "filtro_auditoria_pc.php", function( dataHTML ) {
                                $( "#tabladinamica_plan_contable" ).html( dataHTML );
                                $('#deployAuditoriaPC').modal('show');
                              });

}

//***********************************************************************************************************************


    //*********************    ESTE INPUT ANDA !!!         ******************** */


    function activeButton1(){
        var campo = $('#nombre').val();


        if ((campo !=null)&&(campo!='')){
            activeButton2();
        }else{
            $("#btnguardar").prop("disabled", true);

        }

    }

    //*********************    ESTE SELECT ANDA !!!         ******************** */

    function activeButton2(){

        var incompletos = false; // AQUI inicializamos la variable

        $('#tipo').find("option:selected").each(function() {
          if ($(this).val().trim() == '') {
            incompletos = true; // AQUI modificamos la variable
            $("#btnguardar").prop("disabled", true);
          }
           else{
            valor = $('#nombre').val();
                if (valor != ''){
                    $("#btnguardar").prop("disabled", false);
                }
          }
        });
        
        if (incompletos) {// AQUI controlamos la variable
          return;
        }
    }





//****************************************************************** */

    function agregardatos(cadena){
        
//        alert(cadena);
//        return false; 
        
          $.ajax({
            type:"POST",
            url:"pdc_save.php",
            data:cadena,
            success:function(r){
                if(r==1){
                    $('#tabla').load('componentes/tabla.php'); 
                    alertify.warning("REGISTRO AGREGADO CON ÉXITO!!");
                }else{
                    alertify.error("Hubo un fallo!");
                }
            }

        });

    }





    function actualizaDatos(){
        id = $('#idplandecuentau').val();
        codigo = $('#codigoplanu').val();
        numero = $('#numerou').val();
        nombre = $('#nombreu').val();
        tipo = $('#tipou').val();

        cadena= "id=" + id + 
                "&codigo=" + codigo +
                "&numero=" + numero +
                "&nombre=" + nombre +
                "&tipo=" + tipo;
        
//        alert(cadena);
//        return false; 
    
        $.ajax({
        type:"POST",
        url:"pdc_update.php",
        data:cadena,
        success:function(r){
            if(r==1){
//                insertAuditoriaPC(cadena);
//                insertAuditoriaUpdate(cadena);
                $('#tabla').load('componentes/tabla.php'); 
                alertify.warning("REGISTRO ACTUALIZADO CON ÉXITO!!");
            }else{
                alertify.error("Hubo un fallo!");

            }
        }

        });
    }
    
    
//    -------------------------------------------------------------------------------------

 function insertAuditoriaSave(cadena){
   
        $.ajax({
        type:"POST",
        url:"auditoria_save.php",
        data:cadena,
        success:function(r){
            if(r==1){
                alertify.success("AUDITORIA EXITO!");
            }else{
//                alert(r);
//                alertify.error("Hubo un fallo en auditoria!");

            }
        }

        });
     
     
 }
//-----------------------------------------------------------------------------------------

 function insertAuditoriaUpdate(cadena){
     
//        alert(cadena);
//        return false; 
   
        $.ajax({
        type:"POST",
        url:"auditoria_update.php",
        data:cadena,
        success:function(r){
            if(r==1){
                alertify.success("AUDITORIA EXITO!");
            }else{
//                alert(r);
//                alertify.error("Hubo un fallo en auditoria!");

            }
        }

        });
     
     
 }
//-----------------------------------------------------------------------------------------
    
    
       function agregaformEdit(datos){

                d = datos.split('||');

                $('#idplandecuentau').val(d[0]);
                $('#codigoplanu').val(d[1]);
                $('#numerou').val(d[2]);
                $('#nombreu').val(d[3]);
                $('#tipou').val(d[4]);
      
            }
            
            
         function agregaformNew(datos){

                d = datos.split('||');

                $('#idplandecuenta').val(d[0]);

                id = d[0];
                
                var esteid = "esteid=" + id;

                $.ajax({
                        type: "POST",
                        url: "componentes/consulta.php",
                        data: esteid
                 })
                    .done(function(resultado){ //este resultado debe componer el nivel tambien 
        
                        valores = JSON.parse(resultado);
                  
                        codigo = (valores[0]);
                        nivel = (valores[1]);

                       $('#codigo').val(codigo);
                       $('#numero').val(nivel);
                       
        
                     })
                    .fail(function(resultado){
                       alert('No existe!!!')

                     })
                             
//            
        }
                
      

    function pregutarSiNo (id) { 
        alertify.confirm('Eliminar registro', '¿Está seguro que quiere eliminar?', 

        function () { 
            eliminarRegistro(id) }, 

        function(){ 
            alertify.error('Se cancelo')
        });

    }
        
      
    function eliminarRegistro(id){
         
        id = "id=" + id;

        $.ajax({
            type: "POST",
            url: "pdc_destroy.php",
            data: id,
            success: function (r) {
                if(r==1){
//                    insertAuditoriaDestroy(esteid);
                    $('#tabla').load('componentes/tabla.php'); 
                    alertify.warning("SE ELIMINÓ REGISTRO CORRECTAMENTE!");
                }else{
                    alertify.error("Hubo un fallo!");

                }
            }
        });

    }
    
    
 //-----------------------------------------------------------------------------------------

 function insertAuditoriaDestroy(esteid){
     
//        alert(cadena);
//        return false; 
   
        $.ajax({
        type:"POST",
        url:"auditoria_destroy.php",
        data:esteid,
        success:function(r){
            if(r==1){
                alertify.success("AUDITORIA EXITO!");
            }else{
//                alert(r);
//                alertify.error("Hubo un fallo en auditoria!");

            }
        }

        });
    
 }
//-----------------------------------------------------------------------------------------