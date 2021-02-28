

var quienhizoenter =''; //ESTA VARIABLE ES GLOBAL, Y ES LA GENEREADA CON ---> new Date().getUTCMilliseconds();

//quienhizoenter hace referencia a quien selecciono una row de la table deploy 
//lo cual esta perfecto PORQUE NADIE VA A ELIMINAR UNA FILA QUE NO COMPLETO



///////////////////// ELIMINAR SOBRE TABLA RETOMAR //////////////////////////////////////////////////////////////////////
//********************************************************************************************************************** */
    function subtractrow(i){    

    verificarCod = $('#deploy_'+i).val();
    verificarDebe = $('#debe_'+i).val();
    verificarHaber = $('#haber_'+i).val();

    row = $('#row_'+i).val();


    if((verificarCod != '')&&((verificarDebe != '') || (verificarHaber != ''))){
    
        id_sw = 'id_sw=' + i;


        // alert(id_sw);
        // return false; 


        $.ajax({
            type:"GET",
            url:"renglon/renglon_destroy.php",
            data:id_sw,
        })
        .done(function(resultado){
            // cantidad = JSON.parse(resultado);
            // name = cuenta[0];
            // console.log(cantidad);

            $('#row_'+i).remove();

            alertify.success("Se elimino con exito!");
            setInputDebeTotal();
            setInputHaberTotal();
            setInputDebeDif();
            setInputHaberDif();

        ç
               

        

          
         })
         .fail(function(resultado){
            alertify.error("Hubo un fallo!");

        })
 
      }
    }





    ///////////////////// ELIMINAR SOBRE TABLA RETOMAR //////////////////////////////////////////////////////////////////////
    function subtractrowFirst(){    


    //  idSwRec = firstRow; 
     
     verificarCod = $('#deploy_first').val();
     verificarDebe = $('#debe_first').val();
     verificarHaber = $('#haber_first').val();

    if((verificarCod != '')&&((verificarDebe != '') || (verificarHaber != ''))){


        // if (idSwRec != 'first'){
        //     id_sw = 'id_sw=' + idSwRec;

        // }else{
        //     id_sw = 'id_sw=' + 1;

        // }

        
        id_sw = 'id_sw=' + 1;

        // alert(id_sw);
        // return false; 

       

        $.ajax({
            type:"GET",
            url:"renglon/renglon_destroy.php",
            data:id_sw,
        })
        .done(function(resultado){
            // cuenta = JSON.parse(resultado);
            // name = (cuenta[0].nombre);
            // console.log(name);
            $('#row_first').remove();

            alertify.success("Se elimino con exito!");
            setInputDebeTotal();
            setInputHaberTotal();
            setInputDebeDif();
            setInputHaberDif();


            // if (idSwRec != 'first'){
            //     $('#row_'+idSwRec).remove();
    
            // }else{
            //     $('#row_first').remove();
    
            // }

          
         })
         .fail(function(resultado){
            alertify.error("Hubo un fallo!");

        })

    }

    }
    // /////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////


        // ///////////////   LUEGO AHORRAR CODIGO        ///////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////

    function disableHaberUno(){  

 
        // $('#haber_uno').prop('disabled', 'disabled');
        valor = $('#haber_uno').val();


            if (valor == ''){    
                //al haber le doy el aspecto de color 
                $('#haber_uno').prop('readonly', 'readonly');
                $('#haber_uno').addClass("inpColDisabled");
                $('#debe_uno').removeClass("inpColDisabled");
                $('#debe_uno').prop('readonly', false);
            }


         $('#debe_uno').on({
          "focus": function (event) {
              $(event.target).select();
          },
          "keyup": function (event) {
              $(event.target).val(function (index, value ) {
                  return value.replace(/\D/g, "")
                              .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                              .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
              });
          }
      });

        
  }


  function disableDebeUno(){  

 
    // $('#debe_uno').prop('disabled', 'disabled');

    valor = $('#debe_uno').val();


    if (valor == ''){    
        //al haber le doy el aspecto de color 
        $('#debe_uno').prop('readonly', 'readonly');
        $('#debe_uno').addClass("inpColDisabled");
        $('#haber_uno').removeClass("inpColDisabled");
        $('#haber_uno').prop('readonly', false);
    }




     $('#haber_uno').on({
      "focus": function (event) {
          $(event.target).select();
      },
      "keyup": function (event) {
          $(event.target).val(function (index, value ) {
              return value.replace(/\D/g, "")
                          .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                          .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
          });
      }
  });

    
}

    // /////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////




    function disableFirstHaber(){  

 
        //   $('#haber_first').prop('disabled', 'disabled');
            valor = $('#haber_first').val();


            if (valor == ''){    
                //al haber le doy el aspecto de color 
                $('#haber_first').prop('readonly', 'readonly');
                $('#haber_first').addClass("inpColDisabled");
                $('#debe_first').removeClass("inpColDisabled");
                $('#debe_first').prop('readonly', false);
            }


      
     

           $('#debe_first').on({
            "focus": function (event) {
                $(event.target).select();
            },
            "keyup": function (event) {
                $(event.target).val(function (index, value ) {
                    return value.replace(/\D/g, "")
                                .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
                });
            }
        });

          
    }



    function disableHaber(i){
        // $('#haber_'+i).prop('disabled', 'disabled');
        valor = $('#haber_'+i).val();


            if (valor == ''){    
                //al haber le doy el aspecto de color 
                $('#haber_'+i).prop('readonly', 'readonly');
                $('#haber_'+i).addClass("inpColDisabled");
                $('#debe_'+i).removeClass("inpColDisabled");
                $('#debe_'+i).prop('readonly', false);
            }


        $('#debe_'+i).on({
            "focus": function (event) {
                $(event.target).select();
            },
            "keyup": function (event) {
                $(event.target).val(function (index, value ) {
                    return value.replace(/\D/g, "")
                                .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
                });
            }
        });
        
    }

    //****************************************************************************************************************** */


    function disableFirstDebe(){
        // $('#debe_first').prop('disabled', 'disabled');
        valor = $('#debe_first').val();

        // alert(valor);

        if (valor == ''){
            //al haber le doy el aspecto de color 
            $('#debe_first').prop('readonly', 'readonly');
            $('#debe_first').addClass("inpColDisabled");
            $('#haber_first').removeClass("inpColDisabled");
            $('#haber_first').prop('readonly', false);

        }

        $('#haber_first').on({
            "focus": function (event) {
                $(event.target).select();
            },
            "keyup": function (event) {
                $(event.target).val(function (index, value ) {
                    return value.replace(/\D/g, "")
                                .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
                });
            }
        });
        
    }


    function disableDebe(i){
        // $('#debe_'+i).prop('disabled', 'disabled');

        valor = $('#debe_'+i).val();


            if (valor == ''){    
                //al haber le doy el aspecto de color 
                $('#debe_'+i).prop('readonly', 'readonly');
                $('#debe_'+i).addClass("inpColDisabled");
                $('#haber_'+i).removeClass("inpColDisabled");
                $('#haber_'+i).prop('readonly', false);
            }


        $('#haber_'+i).on({
            "focus": function (event) {
                $(event.target).select();
            },
            "keyup": function (event) {
                $(event.target).val(function (index, value ) {
                    return value.replace(/\D/g, "")
                                .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
                });
            }
        });
        
        
    }


//************          TOTALES            ************************** */


function setSeatSession(seat){ 
        
    asiento= 'asiento=' + seat; 

    // alert(asiento);
    // return false; 

    $.ajax({
        type: "GET",
        url: "componentes/asientoborrador.php",
        data: asiento
        })
        .done(function(resultado){
            //1- Primero cambio el tipo de dato del input de feccha, DE DATE A TEXT
            $('#fechaContableNew').attr('type', 'text');
            //2-Le doy disabled a ese input
//            $('#fechaContableNew').prop('disabled', 'disabled');
            //3- Recien ahi retomo la tabla "retomarTabla" 
            $.get( "componentes/retomartabla.php", function( dataHTML ) {
                $('#tabla').empty().html(dataHTML);
     
                        setInputDebeTotal();
                        setInputHaberTotal();
                        setInputDebeDif();
                        setInputHaberDif();

                        $('#inputSeat').val(seat); 
              });

    })
    .fail(function(resultado){
        console.log('No existe!!!')

    })



}








//ACA ESTA EL PROBLEMA  


    function setCode(code){
        // renglon = 0; 

        $.ajax({
            type: "POST",
            url: "componentes/datos.php",
            data: code
            })
            .done(function(resultado){
                cuenta = JSON.parse(resultado);
                id = (cuenta[0].id);
                name = (cuenta[0].nombre);
                idnewname=(cuenta[0].nombre);
                code = (cuenta[0].codigo);
                type = (cuenta[0].tipo);
                $('#nombreDeCuenta').val(name);

                // renglon = renglon + 1; 

                $.get( "filtrocuentas.php", function() {
                    //Si tipo es igual a cero, no hacer nada, Si es igual a 1 si 
                        if (type != 0){
                        $('#id_'+quienhizoenter).val(id);    
                        // $('#renglon_'+quienhizoenter).val(renglon);    
                        $('#name_'+quienhizoenter).val(name);              
                        $('#deploy_'+quienhizoenter).prop('disabled', true);
                        $('#deploy_'+quienhizoenter).addClass("inpWhite");

                        $('#deploy_'+quienhizoenter).val(code);
                        //   alert(code);
                        //   return false;
        
                      }

                  });
                
                
                // $('#nombreDeCuenta').val() = (cuenta[0].nombre);
             })
             .fail(function(resultado){
                console.log('No existe!!!')

            })
    
 
    }


    // //////////////////////////////////////////////////////////////////////



    
    


    //Cuando agrego la fila con el agregaformNew() le doy por parametro del input nuevo este i que esta en esta funcion
    // para que ese valor este en session y busca 

    
    function functionDeploy(i){ //EL PARAMETRO 'i' CONTIENE EL VALOR DE GENERADO CON ---> new Date().getUTCMilliseconds();
        
        if (event.keyCode == 13) {

                         value= 'value=' + $('#deploy_'+i).val();


                        //  alert(value);
                        //  return false; 

                         quienhizoenter = i;
           
                         $.ajax({
                             type: "POST",
                             url: "componentes/value.php",
                             data: value
                        })
                         .done(function(resultado){

                            //Llamo a PHP para que me dibuje la nueva tabla en el div "tabladinamica"
                            //console.log("LLAMARA A TABLE!!");
                            $.get( "filtrocuentas.php", function( dataHTML ) {
                                $( "#tabladinamica" ).html( dataHTML );
                                $('#deployAsientos').modal('show');
                              });

                             

                            // console.log(resultado);
                             //$('#deployAsientos').modal('show');



                         })
                         .fail(function(resultado){
                             console.log('No existe!!!')

                         })

                    }
    }


//****************************************************************************************************************** */
//****************************************************************************************************************** */


     function FirstRowNew(){

        
    
     verificarName = $('#name_first').val();
     verificarDebe = $('#debe_first').val();
     verificarHaber = $('#haber_first').val();

     verificarFecha = $('#fechaContableNew').val();

     verificarDesc = $('#descripcion_first').val();


    if((verificarFecha == "") || (verificarDesc == "") || (verificarName == "") || ((verificarDebe == "")&&(verificarHaber == ""))){

        alertify.warning('Datos incompletos...');
       

    } else{

        
      $('#plusRow_first').prop('disabled', 'disabled');
      $('#plusRow_first').removeClass('btn-info');
      $('#plusRow_first').removeClass('active');
      $('#plusRow_first').addClass('btn-secondary');
      

      $('#name_first').prop('disabled', 'disabled');
      $('#debe_first').prop('disabled', 'disabled');
      $('#haber_first').prop('disabled', 'disabled');

      $('#descripcion_first').prop('disabled', 'disabled');
      $('#fechaOp_first').prop('disabled', 'disabled');
      $('#fechaVto_first').prop('disabled', 'disabled');
   
      $('#fechaContableNew').prop('disabled', 'disabled');
      
      $('#btnTypeSeat').prop('disabled', 'disabled');

      
            // ************************************
        // VOY A INTENTAR CAPTURAR LA FECHA DE OPERACION MIN 

        


            // **************************************

             id = $('#id_first').val();

             tipo_asiento = $('#inputTypeSeat').val();

          //    numeroAsiento = $('inputNewSeat').val();

             fecha_contable = $('#fechaContableNew').val();
             cuenta = $('#deploy_first').val();
             name = $('#name_first').val();
             descripcion = $('#descripcion_first').val();
             fecha_op = $('#fechaOp_first').val(); 
             fecha_vto = $('#fechaVto_first').val();  
             debe = $('#debe_first').val();
             haber = $('#haber_first').val();
             cargado = 'false'; 
 
             cadena= "id=" + id +
                     "&tipo_asiento=" + tipo_asiento +
                     "&fecha_contable=" + fecha_contable +
                     "&id_sw= " + 1 +
                     "&cuenta=" + cuenta +
                     "&name=" + name +
                     "&descripcion=" + descripcion +
                     "&fecha_op=" + fecha_op +
                     "&fecha_vto=" + fecha_vto +
                     "&debe=" + debe +
                     "&haber=" + haber +
                     "&cargado=" + cargado;
 
             agregardatos(cadena);
          //    setInputDebeTotal(numeroAsiento);

 
     
       ////////////////////// PASO TRES DENTRO DE LA FUNCION//////////////////
 
       var tds=$("#tablaDinamicaLoad tr:first td").length;//numero de columnas

             
       var trs=$("#tablaDinamicaLoad tr").length;//numero de filas contando el thead

       
       var index1 = new Date().getUTCMilliseconds();
       // <tr id="row_first">

       var nuevaFila="<tr id='row_"+index1+"'>";

    
       for(var i=0;i<tds;i++){
          if(i==0){
              nuevaFila+="<td hidden><input type='text'  id='id_"+index1+"' value='' disabled class='inpWhite'></td>" 
          }else if(i==1){
              nuevaFila+="<td><input type='text' id='deploy_"+index1+"' value='' onkeyup='functionDeploy(&quot;"+index1+"&quot;)'></td>"
          }else if(i==2){
              nuevaFila+="<td><button id='plus_"+index1+"' class='btn btn-info btn-lg active' onclick='addRow(&quot;"+index1+"&quot;)'><span class='glyphicon glyphicon-plus'></span></button></td>"
          }else if(i==3){    
              nuevaFila+="<td> <input id='name_"+index1+"' type='text' value='' disabled class='inpGreen'></td>"   
          }else if(i==4){  
              nuevaFila+="<td> <input id='descripcion_"+index1+"' type='text' size='44' value='"+descripcion+"'></td>"       
          }else if(i==5){ 
              nuevaFila+="<td> <input id='fechaOp_"+index1+"' min='"+fecha_contable+"' type='date' class='form-control input-lg' size='17' value='"+fecha_op+"'></td>"       
          }else if(i==6){ 
              nuevaFila+="<td> <input id='fechaVto_"+index1+"' min='"+fecha_contable+"' type='date' class='form-control input-lg' size='15' value='"+fecha_vto+"'></td>"
          }else if(i==7){ 
              nuevaFila+="<td><input type='text'  id='debe_"+index1+"' class='inpWhite' value='' onclick='disableHaber(&quot;"+index1+"&quot;)'></td>" 
          }else if(i==8){    
                  nuevaFila+="<td><input type='text'  id='haber_"+index1+"' class='inpWhite' value='' onclick='disableDebe(&quot;"+index1+"&quot;)'></td>"   
          }else if(i==9){    
              nuevaFila+="<td><button id='minusRow' class='btn btn-danger btn-lg' onclick='subtractrow(&quot;"+index1+"&quot;)'><span class='glyphicon glyphicon-minus'></span></button></td>"   
              
          }else{

           nuevaFila+="<td></td>";
           // index1++;
           // index2++;
       }

       }
       nuevaFila+="</tr>";
       
       $("#tablaDinamicaLoad").append(nuevaFila);

       $('#plusRow_first').prop('disabled', 'disabled');



       //INTENTO CON GET DE AJAX 

      


    }

                         
}
         

//****************************************************************************************************************** */
//****************************************************************************************************************** */


function addRow(i){
//1- Si en ves de tomar la fecha_contable que SE MUESTRA MAL en el input, voy a buscarla tal como es en la base de datos?? 
//2- Si sale bien. hacer lo mismo con addRowReturn

    seat = 'seat=' + $('#inputSeat').val(); //NUMERO DE ASIENTO

        $.ajax({
            type:"POST",
            url: "componentes/buscarFechaContable.php",
            data:seat,
            })
            .done(function(resultado){
               fecha_contable = resultado;   
            })
            .fail(function(resultado){
                
            })

//    numRow = i; 


    verificarName = $('#name_'+i).val();
    verificarDebe = $('#debe_'+i).val();
    verificarHaber = $('#haber_'+i).val();
    verificarDesc = $('#descripcion_'+i).val();
    


    if((verificarDesc == "") || (verificarName == "") || ((verificarDebe == "")&&(verificarHaber == ""))){
      
        alertify.warning('Datos incompletos...'); 
       
    } else{
        $('#plus_'+i).prop('disabled', 'disabled');
        $('#plus_'+i).removeClass('btn-info');
        $('#plus_'+i).removeClass('active');
        $('#plus_'+i).addClass('btn-secondary');

    
      
              // ----------------------------------------------------------------
      
              $('#name_'+i).prop('disabled', 'disabled');
              $('#debe_'+i).prop('disabled', 'disabled');
              $('#haber_'+i).prop('disabled', 'disabled');
              $('#descripcion_'+i).prop('disabled', 'disabled');
              $('#fechaOp_'+i).prop('disabled', 'disabled');
              $('#fechaVto_'+i).prop('disabled', 'disabled');
      
         
      
                      tipo_asiento = $('#inputTypeSeat').val(); //TIPO DE ASIENTO
         
                      id = $('#id_'+i).val();
                      cuenta = $('#deploy_'+i).val();
                      name = $('#name_'+i).val();
                      descripcion = $('#descripcion_'+i).val();
                      fecha_op = $('#fechaOp_'+i).val(); 
                      fecha_vto = $('#fechaVto_'+i).val();  
                      debe = $('#debe_'+i).val();
                      haber = $('#haber_'+i).val();
                      cargado = 'false'; 
             
             
                      cadena= "id=" + id +
                      "&tipo_asiento=" + tipo_asiento +
                      "&fecha_contable=" + fecha_contable +
                      "&id_sw= " + i +
                      "&cuenta=" + cuenta +
                      "&name=" + name +
                      "&descripcion=" + descripcion +
                      "&fecha_op=" + fecha_op +
                      "&fecha_vto=" + fecha_vto +
                      "&debe=" + debe +
                      "&haber=" + haber +
                      "&cargado=" + cargado;
      
                       agregardatos(cadena);
      
      
          // -------------------------------------------------------------------------------------------------------
               
      
                              // $('#menuselect').empty().load('componentes/selectmenu.php');
              //******************************************************* */
             
                             var tds=$("#tablaDinamicaLoad tr:first td").length;//numero de columnas
      
                     
                             var trs=$("#tablaDinamicaLoad tr").length;//numero de filas contando el thead
                 
                 
                             var index1 = new Date().getUTCMilliseconds();
                             // <tr id="row_first">
                 
                             var nuevaFila="<tr id='row_"+index1+"'>";
      
            
            
                             for(var i=0;i<tds;i++){
                              if(i==0){
                                  nuevaFila+="<td hidden><input type='text'  id='id_"+index1+"' value='' disabled class='inpWhite'></td>" 
                              }else if(i==1){
                                  nuevaFila+="<td><input type='text' id='deploy_"+index1+"' value='' onkeyup='functionDeploy(&quot;"+index1+"&quot;)'></td>"
                              }else if(i==2){
                                  nuevaFila+="<td><button id='plus_"+index1+"' class='btn btn-info btn-lg active' onclick='addRow(&quot;"+index1+"&quot;)'><span class='glyphicon glyphicon-plus'></span></button></td>"
                              }else if(i==3){    
                                  nuevaFila+="<td> <input id='name_"+index1+"' type='text' value='' disabled class='inpGreen'></td>"   
                              }else if(i==4){  
                                  nuevaFila+="<td> <input id='descripcion_"+index1+"' type='text' size='44' value='"+descripcion+"'></td>"       
                              }else if(i==5){ 
                                  nuevaFila+="<td> <input id='fechaOp_"+index1+"' min='"+fecha_contable+"' type='date' class='form-control input-lg' size='17' value='"+fecha_op+"'></td>"       
                              }else if(i==6){ 
                                  nuevaFila+="<td> <input id='fechaVto_"+index1+"' min='"+fecha_contable+"' type='date' class='form-control input-lg' size='15' value='"+fecha_vto+"'></td>"
                              }else if(i==7){ 
                                  nuevaFila+="<td><input type='text'  id='debe_"+index1+"' class='inpWhite' value='' onclick='disableHaber(&quot;"+index1+"&quot;)'></td>" 
                              }else if(i==8){    
                                      nuevaFila+="<td><input type='text'  id='haber_"+index1+"' class='inpWhite' value='' onclick='disableDebe(&quot;"+index1+"&quot;)'></td>"   
                              }else if(i==9){    
                                  nuevaFila+="<td><button id='minusRow' class='btn btn-danger btn-lg' onclick='subtractrow(&quot;"+index1+"&quot;)'><span class='glyphicon glyphicon-minus'></span></button></td>"   
                                  
                              }else{
                 
                              nuevaFila+="<td></td>";
                              // index1++;
                              // index2++;
                          }
                 
                          }
                          nuevaFila+="</tr>";
      
                       
                          
                          $("#tablaDinamicaLoad").append(nuevaFila);
      
                          
                          // $('#plusRow_'+i).prop('disabled', 'disabled');
      
                            
              }
        
                                       
}
                 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// function insertSeatPlus(){

//     load('componentes/retomartabla.php');

// }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function addRowReturn(datos){

seat = 'seat=' + $('#inputSeat').val(); //NUMERO DE ASIENTO



        $.ajax({
            type:"POST",
            url: "componentes/buscarFechaContable.php",
            data:seat,
            })
            .done(function(resultado){
               fecha = resultado;      
            })
            .fail(function(resultado){
                
            })

    d = datos.split('||');

    name = d[18];
    descripcion = d[12];
    fecha_op = d[8];
    fecha_vto = d[7];

    // ***************************************************************************************************


    verificarName = $('#name_first').val();
    verificarDebe = $('#debe_first').val();
    verificarHaber = $('#haber_first').val();

    verificarDesc = $('#descripcion_first').val();

    fecha_contable = fecha; 

    if((verificarDesc == "") || (verificarName == "") || ((verificarDebe == "")&&(verificarHaber == ""))){

        alertify.warning('Datos incompletos...');
      
    } else{
        $('#first_plusReturn').prop('disabled', 'disabled');
        $('#first_plusReturn').removeClass('btn-info');
        $('#first_plusReturn').removeClass('active');
        $('#first_plusReturn').addClass('btn-secondary');

        var tds=$("#tablaDinamicaLoad tr:first td").length;//numero de columnas


        var trs=$("#tablaDinamicaLoad tr").length;//numero de filas contando el thead


        var index1 = new Date().getUTCMilliseconds();
        // <tr id="row_first">

        var nuevaFila="<tr id='row_"+index1+"'>";

      
      
        for(var i=0;i<tds;i++){
        if(i==0){
            nuevaFila+="<td hidden><input type='text'  id='id_"+index1+"' value='' disabled class='inpWhite'></td>" 
        }else if(i==1){
            nuevaFila+="<td><input type='text' id='deploy_"+index1+"' value='' onkeyup='functionDeploy(&quot;"+index1+"&quot;)'></td>"
        }else if(i==2){
            nuevaFila+="<td><button id='plus_"+index1+"' class='btn btn-info btn-lg active' onclick='addRow(&quot;"+index1+"&quot;)'><span class='glyphicon glyphicon-plus'></span></button></td>"
        }else if(i==3){    
            nuevaFila+="<td> <input id='name_"+index1+"' type='text' value='' disabled class='inpGreen'></td>"     
        }else if(i==4){  
            nuevaFila+="<td> <input id='descripcion_"+index1+"' type='text' size='44' value='"+descripcion+"'></td>"       
        }else if(i==5){ 
            nuevaFila+="<td> <input id='fechaOp_"+index1+"' min='"+fecha_contable+"' type='date' class='form-control input-lg' size='17' value='"+fecha_op+"'></td>"       
        }else if(i==6){ 
            nuevaFila+="<td> <input id='fechaVto_"+index1+"' min='"+fecha_contable+"' type='date' class='form-control input-lg' size='15' value='"+fecha_vto+"'></td>"
        }else if(i==7){ 
            nuevaFila+="<td><input type='text'  id='debe_"+index1+"' class='inpWhite' value='' onclick='disableHaber(&quot;"+index1+"&quot;)'></td>" 
        }else if(i==8){    
                nuevaFila+="<td><input type='text'  id='haber_"+index1+"' class='inpWhite' value='' onclick='disableDebe(&quot;"+index1+"&quot;)'></td>"   
        }else if(i==9){    
            nuevaFila+="<td><button id='minusRow' class='btn btn-danger btn-lg' onclick='subtractrow(&quot;"+index1+"&quot;)'><span class='glyphicon glyphicon-minus'></span></button></td>"   
            
        }else{

        nuevaFila+="<td></td>";
        // index1++;
        // index2++;
    }

    }
    nuevaFila+="</tr>";
                    
    $("#tablaDinamicaLoad").append(nuevaFila);


    // jajajajajjajajajajajajajaja


    $('#first_plusReturn').prop('disabled', 'disabled');


    
    }

                                       
}
                 








//****************************************************************************************************************** */
//****************************************************************************************************************** */




    function agregardatos(cadena){
        // numeroAsiento = $('inputNewSeat').val();

          $.ajax({
            type:"POST",
            url:"renglon/renglon_save.php",
            data:cadena,

            success:function(r){
                if(r==1){
                    // $('#tabla').load('componentes/tabla.php'); //BUENA IDEA PARA RETOMARRRRRRRRRRRR
                    alertify.success("Agregado con exito!");
                    setInputDebeTotal();
                    setInputHaberTotal();
                    setInputDebeDif();
                    setInputHaberDif();

                    // cargadofalse();

                    // insertSeatPlus(cadena);
                    

                }else{
                    alertify.error("Hubo un fallo!");
                }
            }
        });

    }



    function cargadofalse(){
// consulto si hay algun registro que tenga cargadoOk = 0 ..., si es asi LE DOY A TODOS CARGADOOK = 0 !!

        $.ajax({
            url: "verificocargado.php",
            })
            .done(function(resultado){

                })
        
                .fail(function(resultado){
                    console.log('No SE PUDOOOOOOOOOO!!!')

                })


}







    //*********************************************************************************************** */

    function setInputDebeTotal(){
        //VOY AL SERVIDOR Y LE PIDO TODAS LOS DEBE DEL RENGLON ACTUAL --> ME DEVUELVE LA SUMA (primero intentar Navicat)
        // SELECT SUM(debe) FROM renglon 
        // numSeat= "numSeat=" + seat; 

        // alert(numSeat);
        // return false; 

        $.ajax({
            type: "GET",
            // data: numSeat, 
            url:"renglon/total_debe.php",
            })
            .done(function(resultado){
                
                total = JSON.parse(resultado);
                
                // sum = total[0].total;

                // alert(total);
                // return false; 
          
                $('#inpDebe').val(total);

                  })
         
                .fail(function(resultado){
                    console.log('No SE PUDOOOOOOOOOO!!!')

                })

    }


    
    function setInputHaberTotal(){
        //VOY AL SERVIDOR Y LE PIDO TODAS LOS DEBE DEL RENGLON ACTUAL --> ME DEVUELVE LA SUMA (primero intentar Navicat)
        // SELECT SUM(debe) FROM renglon 
        $.ajax({
            type: "POST",
            url:"renglon/total_haber.php",
            })
            .done(function(resultado){
                
                total = JSON.parse(resultado);
                
                // sum = total[0].total;
          
                $('#inpHaber').val(total);

                  })
         
                .fail(function(resultado){
                    console.log('No SE PUDOOOOOOOOOO!!!')

                })

    }

    //******************************************************************************************************************************** */

    
    // function setInputDebeDif(asiento){
        function setInputDebeDif(){
        //VOY AL SERVIDOR Y LE PIDO TODAS LOS DEBE DEL RENGLON ACTUAL --> ME DEVUELVE LA SUMA (primero intentar Navicat)
        // SELECT SUM(debe) FROM renglon 
        // seat = 'seat=' + asiento; 
        $.ajax({
            // type: "POST",
            url:"renglon/dif_debe.php",
            // data: seat,
            })
            .done(function(resultado){
                
                res = JSON.parse(resultado);

          
                $('#totalDebe').val(res);

                // $('#tabla').load('componentes/tabla.php'); 
                $('#menuselect').load('componentes/selectmenu.php');

                  })
         
                .fail(function(resultado){
                    console.log('No SE PUDOOOOOOOOOO!!!')

                })

    }

    function setInputHaberDif(){
        //VOY AL SERVIDOR Y LE PIDO TODAS LOS DEBE DEL RENGLON ACTUAL --> ME DEVUELVE LA SUMA (primero intentar Navicat)
        // SELECT SUM(debe) FROM renglon 
        $.ajax({
            type: "POST",
            url:"renglon/dif_haber.php",
            })
            .done(function(resultado){
                
                res = JSON.parse(resultado);
                
                // dif = res[0].diferencia;
          
                $('#totalHaber').val(res);

                  })
         
                .fail(function(resultado){
                    console.log('No SE PUDOOOOOOOOOO!!!')

                })

    }

   
    //************************************ BOTON CANCELAR **********************************************************//

    function pregutarSiNo () { 

        asiento = $('#inputSeat').val();

        alertify.confirm('Cancelar asiento', '¿Está seguro que quiere cancelar?', 

        function () { 
            eliminarRegistro(asiento) }, 

        function(){ 
            alertify.warning('Se cancelo')
        });

    }
        
      
    function eliminarRegistro(asiento){

        seat='seat=' + asiento; 

        // alert(code_unique);
        // return false; 
  
        $.ajax({
            type:"POST",
            url: "asiento_destroy.php",
            data:seat,
            success: function (r) {
                if(r==1){
                    $('#tabla').load('componentes/tabla.php'); 
                    $('#menuselect').load('componentes/selectmenu.php');

                    alertify.success("Se cancelo correctamente!");
                }else{
                    alertify.error("Hubo un fallo!");

                }
            }
        });

    }
    
    //***************************  BOTON CARGAR ************************************************ */


    function saveSeat(){

        debe = $('#inpDebe').val(); // QUE VALOR OBTENGO ACA? DE tabla.php
        haber = $('#inpHaber').val();

        asiento = $('#inputSeat').val();

    
        if(debe != haber){
            alertify.alert('ERROR al cargar', 'Hay diferencia entre DEBE y HABER!') 

        }else if(debe == ''){
            alertify.alert('ERROR al cargar',  'Campos vacios!') 
        }else{
            
                insertSeat(asiento);

            }

    }



// ///////////////////////////////////////////////////////////////////////////////

    function insertSeat(asiento){

        // alert(asiento);
        // return false; 
        seat = 'seat=' + asiento; 
           
        $.ajax({
            type:"GET",
            // url: "componentes/save_asientoDefinitivo.php",
            url: "componentes/setOkcarga.php",
            data:seat,
            })
            .done(function(resultado){

                // alert(resultado);
                // return(false); 

                    if(resultado == 0){
                        alertify.alert('ERROR!', 'El asiento ya encontraba cargado!') 
                    }else{
                        alertify.success('Asiento CARGADO exitosamente!!');
//                        $('#inputSeat').val('');
//                        document.getElementById("#fechaContableNew").value = ""; 
//                        $('#btnTypeSeat').prop('disabled', false);
//                        $('#tabla').load('componentes/tabla.php');
                           location.reload();
                    }
                
                
            })
        
            .fail(function(resultado){
                // alertify.dialog('El asiento ya esta EN EL DEFINITIVO!!!')

            })

    }


    // ///////////////////////////////////////////////////////////////////////////////

    function preguntarRegisterOk(){


        seat = 'seat=' + $('#inputSeat').val();

        $.ajax({
            type:"GET",
            // url: "componentes/save_asientoDefinitivo.php",
            url: "componentes/consultCargaOk.php",
            data:seat,
            })
            .done(function(resultado){

                // alert(resultado);
                // return(false); 

                    if(resultado == 0){
                        alertify.alert('ERROR!', 'El asiento no se encutra cargado aún!') 
                    }else{
                        // num_asiento = seat; 
                        registerSeat(seat); 
                    }
                
                
            })
        
            .fail(function(resultado){
                // alertify.dialog('El asiento ya esta EN EL DEFINITIVO!!!')

            })

    }




    function registerSeat(seat){

//        num_asiento = 'num_asiento=' + num_asiento; 
        
        $.ajax({
            type:"POST",
            url: "componentes/save_asientoDefinitivo.php",
            data:seat,
            })
            .done(function(resultado){
//                     alert(resultado);
//                     return false;

                if(resultado == 1){
                    typeSeat = "ASIENTO DE APERTURA";
                    alertify.notify(typeSeat+" "+"registrado con éxito!");
//                    $('#tabla').load('componentes/tabla.php')
                    updateMayor();
                    location.reload();

                }else if(resultado == 9){
                    typeSeat = "ASIENTO DE CIERRE";
                    alertify.notify(typeSeat+" "+"registrado con éxito!");
//                    $('#tabla').load('componentes/tabla.php')
                    location.reload();
                }else{
                    alertify.notify("ASIENTO REGISTRADO EXITOSAMENTE !");
//                    $('#tabla').load('componentes/tabla.php'); 
                    location.reload();
                }

            close_session();    
            })
    
        .fail(function(resultado){
            // alertify.dialog('El asiento ya esta EN EL DEFINITIVO!!!')

        })

    }    
    



// -----------------------------------------------------------
    function close_session(){

        $.ajax({
            url: "cerrarsession.php",
            success: function (r) {
                if(r==1){
                    // alertify.success("SE HA CERRADO SESSION!");
                }else{
                    alertify.error("Hubo un fallo!");

                }
            }
        });

    }




    function  disabledTypeSeat(asiento){



        if(asiento == 1){

                console.log(asiento); 

        }else if(asiento == 9){

            console.log(asiento); 

        }           
    }    








    function updateMayor(){

        $.ajax({
            // type:"GET",
            url: "componentes/updateFechaMayor.php",
            // data:seat,
            })
            .done(function(resultado){

                // alert(resultado);
                // return false; 

                alertify.notify("MAYOR ACTUALIZADO CORRECTAMENTEEEEE !")



            })

        .fail(function(resultado){


        })

    }


// ******************************************************

