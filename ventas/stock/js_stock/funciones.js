

    //*********************    ESTE INPUT ANDA !!!         ******************** */


//    function activeButton1(){
//        var campo = $('#nombre').val();
//
//
//        if ((campo !=null)&&(campo!='')){
//            activeButton2();
//        }else{
//            $("#btnguardar").prop("disabled", true);
//
//        }
//
//    }

    //*********************    ESTE SELECT ANDA !!!         ******************** */

//    function activeButton2(){
//
//        var incompletos = false; // AQUI inicializamos la variable
//
//        $('#tipo').find("option:selected").each(function() {
//          if ($(this).val().trim() == '') {
//            incompletos = true; // AQUI modificamos la variable
//            $("#btnguardar").prop("disabled", true);
//          }
//           else{
//            valor = $('#nombre').val();
//                if (valor != ''){
//                    $("#btnguardar").prop("disabled", false);
//                }
//          }
//        });
//        
//        if (incompletos) {// AQUI controlamos la variable
//          return;
//        }
//    }





//****************************************************************** */

    function agregardatos(cadena){

          $.ajax({
            type:"POST",
            url: "stock_save.php",
            data:cadena,
            success:function(r){
                if(r==1){
                    $('#tabla_stock').load('componentes/tabla_stock.php');  
//                    $('#buscador').load('../componentes/buscador.php'); 
                    alertify.success("Agregado con exito!");
                }else{
                    alertify.error("Hubo un fallo!");
                }
            }

        });

    }





    function actualizaDatos(){
        
   
        
        id = $('#idu').val();
        
        cod_art = $('#cod_artu').val();
        descripcion = $('#descripcionu').val();
        unidades = $('#unidadesu').val();
        costo_unitario = $('#costo_unitariou').val();
        precio_neto = $('#precio_netou').val();
        tipos_tasas_id = $('#tipos_tasas_idu').val();  
        impuesto_interno = $('#impuesto_internou').val();
        bonificacion = $('#bonificacionu').val();
        
        cadena= "id=" + id + 
                "&cod_art=" + cod_art +
                "&descripcion=" + descripcion +
                "&unidades=" + unidades +
                "&costo_unitario=" + costo_unitario +
                "&precio_neto=" + precio_neto +
                "&tipos_tasas_id=" + tipos_tasas_id +
                "&impuesto_interno=" + impuesto_interno +
                "&bonificacion=" + bonificacion;

        $.ajax({
        type:"POST",
        url:"stock_update.php",
        data:cadena,
        success:function(r){
            if(r==1){
                $('#tabla_stock').load('componentes/tabla_stock.php'); 
                alertify.success("Actualizado con exito!");
            }else{
                alertify.error("Hubo un fallo!");

            }
        }

        });
    }
    
    
       function agregaformEdit(datos){

                d = datos.split('||');

                $('#idu').val(d[0]);
                $('#cod_artu').val(d[1]);
                $('#descripcionu').val(d[2]);
                $('#unidadesu').val(d[3]);
                $('#costo_unitariou').val(d[4]);
                $('#precio_netou').val(d[5]);;
                $('#tipos_tasas_idu').val(d[6]);  
                $('#impuesto_internou').val(d[7]);;
                $('#bonificacionu').val(d[8]);

            }
            
            
            
           
         function agregaformNew(datos){

//                sendDatos = datos.split('||');
                $.ajax({
                        type: "POST",
                        url: "componentes/cliente_save.php",
                        data: datos,
                 })
                    .done(function(resultado){ //este resultado debe componer el nivel tambien 
                        alertify.success("Datos agregados correctamente!");
                 
                     })
                    .fail(function(resultado){
                       alert('Un problema!!!')

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
  
        esteid = "id=" + id;

        $.ajax({
            type: "POST",
            url: "stock_destroy.php",
            data: esteid,
            success: function (r) {
                if(r==1){
                    $('#tabla_stock').load('componentes/tabla_stock.php');
                    alertify.success("Se eliminó correctamente!");
                }else{
                    alertify.error("Hubo un fallo!");

                }
            }
        });

    }
    
    
    

