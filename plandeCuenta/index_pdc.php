
<?php

     session_start();
  
    unset($_SESSION['consulta']);

  
    $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');

    $stament = $conn->prepare('SELECT * FROM plandecuenta order by plandecuenta.codigo');
    //$stament = $conn->prepare('SELECT id, codigo, numero, nombre, tipo FROM plandecuenta');
    $stament->execute();
  
    $arrayView = array();
    

    while ($row = $stament->fetch()) {
//            $view = $row['codigo']." - ".$row['nombre'];
            $view = $row['codigo'];
            // $nombre = $row['nombre'];
            array_push($arrayView, $view);         
    }

    // echo json_encode($arrayView);
  
  
?>


<html>
    <head>
        <meta charset="UTF-8">
        
        <link rel="stylesheet" href="../estilos/estilos.css">
        <link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/alertify.css">
        <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/themes/default.css">
        <link rel="stylesheet" type="text/css" href="../librerias/select2/css/select2.css">
        
        <link rel="stylesheet" type="text/css" href="../librerias/datatable/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../librerias/datatable/dataTables.bootstrap.min.css">
        
        <link rel="stylesheet" type="text/css" href="../librerias/fonts/glyphicons-halflings-regular.woff2">
        
        <link rel="stylesheet" type="text/css" href="../librerias/select2/js/jquery-ui.css">
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
         
        <!-- <link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/iconos.css"> -->

        <script src="../lib/jquery/jquery-1.9.1.min.js"></script>
 

        

        <script src="js_pc/funciones_pc.js"></script>
        <script src="../librerias/bootstrap/js/bootstrap.js"></script>
        <script src="../librerias/alertifyjs/alertify.js"></script>
        <script src="../librerias/select2/js/select2.js"></script>
        <script src="../librerias/datatable/jquery.dataTables.min.js"></script>
        
        <script src="../librerias/datatable/dataTables.bootstrap.min.js"></script>
        
        <script src="../librerias/select2/js/jquery-ui.js"></script>
   
       <script src='../librerias/select2/js/mask/jquery.maskedinput.js'></script>

       <!-- --------- mask ------------- -->
       <!-- https://www.smartherd.com/mask-inputs-using-jquery-mask-plugin/ -->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
       

    </head>
 
     <header>
        <div id="header">
            <ul class="nav navbar-nav">
                <li><a class="btn btn-success btn-lg" onclick="functionDeployAuditoriaPC()">AUDITORIA P. DE CUENTAS</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a class="btn btn-primary btn-lg" href="../contabilidad.php" style="margin-left: 10px">SALIR</a></li>  
            </ul>
        </div>  

    </header>
  
    <!-- <br><br><br> -->
    <body class="mainBody">
    <div class="logoContornoWhite">
            <div class="logo">
                <div class="nombreEmpresa">
                    <?php echo 'EMPRESA: '.'"'.$_SESSION['empresa.nombre'].'"';?>
                    <br>
                    <br>
                    <?php echo 'USUARIO: '.'"'.$_SESSION['usuario'].'"';?>
                    
                </div>
            </div>
        </div>




        <div>        
        <!-- <input type="text" value="jkjjjj" id="pruebo" name="pruebo"/> -->
            <div id="buscador"></div>
            <div id="tabla"></div>      
        </div>
        
        <!-- ******************************************* -->

        <!-- Modal para registr2os nuevos -->
    <form id="formModal"> 
     <!--<div class="form-group has-error">--> 
        <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" id="closeform" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">REGISTRO DE CUENTAS</h4>
                    </div>

                    <div class="modal-body"> 
                        <div  class="form-group">
                            <label>ID</label>
                            <div class="input-group">
                                <input type="text" id="idplandecuenta" name="idplandecuenta" class="form-control input-sm"  disabled>
                            </div>
                        </div>
                         
                        <div  class="form-group">
                            <label>CODIGO</label>
                            <div class="input-group">
                                <input type="text" id="codigo" name="codigo" class="form-control input-sm"  disabled>
                                <div class="input-group-addon" id="adherir">
                                    
                                </div>
                            </div>
                        </div>

                        <div  class="form-group">
                            <label>NIVEL</label>
                            <input type="text" id="numero" name="numero" class="form-control input-sm"  disabled>
                        </div>
                            
                        <div  class="form-group">
                            <label>NOMBRE</label>
                            <input type="text" id="nombre" name="nombre" class="form-control input-sm"  onkeyup="activeButton1()">
                        </div>

                        <div  class="form-group">
                            <label>TIPO</label>
                            <select id="tipo" name="tipo" class="contenedor" onchange="activeButton2()">
                                    <option></option>
                                    <option value="0">0- Titulo</option>  
                                    <option value="1">1- Cuenta</option>      
                            </select>
                        </div>
                        
                      
                      
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-dismiss="modal" id="btnguardar" disabled>Agregar</button>
                        <!-- <input type="submit" class="button" value="Crear" name="crear"> -->
                    </div>
                </div>
            </div>
        </div>
    <!--</div>-->     
    </form> 
       
        <!-- Modal para edicion de datos -->
        
        <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar datos</h4>
            </div>
            <div class="modal-body">
                 <div  class="form-group">
                            <label>ID</label>
                            <div class="input-group">
                                <input type="text" id="idplandecuentau" name="idplandecuentau" class="form-control input-sm"  disabled>
                            </div>
                </div>
                
                <div  class="form-group">
                    <label>CÓDIGO PLAN</label>
                    <!-- <input type="text" id="codigoplanu"  class="form-control input-sm" disabled>    -->
                    <input type="text" id="codigoplanu"  class="form-control input-sm" disabled>       
                </div>
                    
                <div  class="form-group">
                    <label>NIVEL</label>
                    <!-- ¿PORQUE NO ME MUESTRA EL MALDITO NUMEROU? -->
                    <input type="text" id="numerou" class="form-control input-sm" disabled>      
                </div>
               
                <div  class="form-group">
                   <label>NOMBRE</label>
                   <input type="text" id="nombreu" class="form-control input-sm">        
                </div>
                
                 <div  class="form-group">
                   <label>TIPO</label>
                   <input type="text" id="tipou" class="form-control input-sm">        
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="actualizadatos">Guardar cambios</button>
            </div>
            </div>
        </div>
        </div>
  <!--*********************************************************************************-->

            <div class="modal fade" id="deployAuditoriaPC" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" id="widthModalPC" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" id="closeform" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel" align="center">AUDITORIA SOBRE PLAN DE CUENTAS</h4>
                    </div>
                    <!--ACA LE AGREGO LA TABLA QUE ESTA EN filtrocuentas.php-->
                         <div class="container-fluid">
                            <div class="row-fluid">
                                <div id="tabladinamica_plan_contable"></div>
                            </div>
                        </div>
                </div>
            </div>
        </div>   
      
     <!--*********************************************************************************-->

        <!-- ******************************************** -->
        
        <script type="text/javascript">
            $(document).ready(function(){
                $('#tabla').load('componentes/tabla.php'); 
                // $('#buscador').load('componentes/buscador.php'); 
                $('#filtra').load('componentes/filtra.php');
            });
        </script>



<!-- closeform -->

        <script type="text/javascript">
           
           $(document).ready(function(){
                $('#closeform').click(function(){
                         
                    $('#formModal')[0].reset();
                    $('#span').remove();
                  
                });
                
            });
        </script>



        <script type="text/javascript">

            // $('btnguardar').removeAttr('disabled');


            



        //    $( function() {
        //         $("#tipo").change( function() {
        //             if ($(this).val() === "-1") {
        //                 $("#btnguardar").prop("disabled", true);
        //             } else {
        //                 $("#btnguardar").prop("disabled", false);
        //             }
        //         });
        //      });




        </script>




        <script type="text/javascript">
            $(document).ready(function(){
                $('#btnguardar').click(function(){ //ANTES DE GUARDAR ARRIBA VERIFICO SI ESTAN TODOS LOS CAMPOS COMPLETOS, HABILITANDO BOTON

                    //Primero le btnguardar al row seleccionado

                    $(".trColor").removeClass("background-color", "#0420c2");



                    //nivel = $('#numerou')val();
                
                    codigo = $('#codigo').val();
                    numero = $('#numero').val();
                    nombre = $('#nombre').val();
                    tipo = $('#tipo').val();

                    cadena="codigo=" + codigo +
                            "&numero=" + numero +
                            "&nombre=" + nombre +
                            "&tipo=" + tipo;
                    
                    agregardatos(cadena);
                    
                    $('#formModal')[0].reset();
                    // $('#icono').hide();
                    $('#span').remove();
                });
                
                
                 $('#actualizadatos').click(function () { 
                      actualizaDatos();
                      
                 });
                
                
            });
     

        </script>


            <!-- <script type="text/javascript">

                    $(document).ready(function () {
                        var items = <?= json_encode($arrayView) ?>
                        
                        var texto = json_decode(items);
                    
                        $('#pruebo').click(function () { 
                            alert(texto);
                            return false; 
                        });         
                   
                        
                    });

                

            </script> -->



        
        <script type="text/javascript">
             $(document).ready(function(){
              
                 var items = <?= json_encode($arrayView) ?>
                
                //  alert(items);
                //  return false;
                 

                  $('#codigo').autocomplete({
                    source: items,
                    appendTo: $("#modalNuevo"),
//                    minLength: 2
                    select: function (event, item){
                        console.log(item.item.value); 
                    }

                });
                
            });         
        </script>
        

        
         <script type="text/javascript">
            $(document).ready(function(){
                // $('#icono').hide();

            $('#codigo').on('change', function(){    
               var estecod = 'estecod=' + $('#codigo').val();
                

                    $.ajax({
                        type: "POST",
                        url: "componentes/existecod.php",
                        data: estecod
                    })
                    .done(function(resultado){
                       $('#adherir').html(resultado)
                     })
                    .fail(function(resultado){
//                       alert('No existe!!!')
                        $('#adherir').html(resultado)
                        
                     })
                             
//                
            });   
                
       
                
                
            });
        </script>
        
        <script type='text/javascript'>
  
                // $(document).ready(function($){
                //     $('#codigo').mask('0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0');
                // });
        
        </script>


        


        <script type= "text/javascript">
//
//            $(document).on('click', 'tbody tr', function () {
//                $(this).addClass('activeColour').siblings().removeClass('activeColour');
//            });

        </script>






        <script type= "text/javascript">

//            $(document).on('click', 'tbody tr #thisCod', function () {
//            
//                var celda = $(this);
//
//                cod = celda.html(); 
//
//                $('#codigo').val(cod);
//
//              
//            });

        </script>




    </body>
    
</html>


