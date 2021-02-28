
<?php

    $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
    
    $query = "SELECT tipos_tasas.* FROM tipos_tasas";
    
//    $query2 = "SELECT provincias.* FROM provincias ";


?>



<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../estilos/estilos.css">
        <link rel="stylesheet" type="text/css" href="../../librerias/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../librerias/alertifyjs/css/alertify.css">
        <link rel="stylesheet" type="text/css" href="../../librerias/alertifyjs/css/themes/default.css">
        <link rel="stylesheet" type="text/css" href="../../librerias/select2/css/select2.css">
        
        <link rel="stylesheet" type="text/css" href="../../librerias/datatable/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../librerias/datatable/dataTables.bootstrap.min.css">
        
        <link rel="stylesheet" type="text/css" href="../../librerias/fonts/glyphicons-halflings-regular.woff2">
        
        <link rel="stylesheet" type="text/css" href="../../librerias/select2/js/jquery-ui.css">
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
         
        <!-- <link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/iconos.css"> -->

        <script src="../../lib/jquery/jquery-1.9.1.min.js"></script>
               
               
        <script src="js_stock/funciones.js"></script>
        <script src="../../librerias/bootstrap/js/bootstrap.js"></script>
        <script src="../../librerias/alertifyjs/alertify.js"></script>
        <script src="../../librerias/select2/js/select2.js"></script>
        <script src="../../librerias/datatable/jquery.dataTables.min.js"></script>
        
        <script src="../../librerias/datatable/dataTables.bootstrap.min.js"></script>
        
        <script src="../../librerias/select2/js/jquery-ui.js"></script>
   
       <script src='../../librerias/select2/js/mask/jquery.maskedinput.js'></script>

       <!-- --------- mask ------------- -->
       <!-- https://www.smartherd.com/mask-inputs-using-jquery-mask-plugin/ -->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
      
    <!--*********************************************************************************************-->
   
    </head>
    <header>
        <div id="header">
            <ul class="nav navbar-nav">
                <li><a class="btn btn-primary btn-lg" href="../../facturacion.php">SALIR</a></li>
            </ul>
        </div>  
    </header>
  
    <br><br><br>
    <body class="mainBody">
        <div>     
            <!-- Aca dentro de este div, va aparecer algo. Ese algo aparece en javascript-->
            <div id="tabla_stock"></div>      
        </div>
        <form id="formModal"> 
     <!--<div class="form-group has-error">--> 
        <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header fondoNegro">
                        <button type="button" class="close" id="closeform" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">REGISTRO DE STOCK</h4>
                    </div>

                    <div class="modal-body fondoGris">    
                        <div  class="form-group" hidden>
                            <label>ID</label>
                            <div class="input-group">
                                <input type="text" id="id" name="id" class="form-control input-sm"  disabled>
                            </div>
                        </div>
                        
                        <div  class="form-group">
                            <label>CÓDIGO ART.</label>
                            <input type="text" id="cod_art" name="cod_art" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>DESCRIPCIÓN</label>
                            <input type="text" id="descripcion" name="descripcion" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>UNIDADES</label>
                            <input type="text" id="unidades" name="unidades" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>COSTO UNITARIO</label>
                            <input type="text" id="costo_unitario" name="costo_unitario" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>PRECIO NETO</label>
                            <input type="text" id="precio_neto" name="precio_neto" class="form-control input-sm">
                        </div>
                        
                         <div  class="form-group">
                            <label>TIPO TASA</label>
                            <select id="tipos_tasas_id" name="tipos_tasas_id" class="contenedor">
                                <option>Seleccionar</option>
                               <?php 
                                    foreach ($conn->query($query) as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['descripcion']; ?></option>
                                <?php  }   ?>
                            </select>
                         </div>

                        <div  class="form-group">
                            <label>IMPUESTO INTERNO</label>
                            <input type="text" id="impuesto_interno" name="impuesto_interno" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>BONIFICACIÓN</label>
                            <input type="text" id="bonificacion" name="bonificacion" class="form-control input-sm">
                        </div>      
                    </div>
                    <div class="modal-footer fondoNegro">
                        <button type="submit" class="btn btn-primary" data-dismiss="modal" id="btnguardar">Agregar</button>
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
                <div class="modal-header fondoNegro">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Editar datos</h4>
                </div>
                    <div class="modal-body fondoGris">    
                        <div  class="form-group" hidden>
                            <label>ID</label>
                            <div class="input-group">
                                <input type="text" id="idu" name="idu" class="form-control input-sm"  disabled>
                            </div>
                        </div>
                        
                         <div  class="form-group">
                            <label>CÓDIGO ART.</label>
                            <input type="text" id="cod_artu" name="cod_artu" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>DESCRIPCIÓN</label>
                            <input type="text" id="descripcionu" name="descripcionu" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>UNIDADES</label>
                            <input type="text" id="unidadesu" name="unidadesu" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>COSTO UNITARIO</label>
                            <input type="text" id="costo_unitariou" name="costo_unitariou" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>PRECIO NETO</label>
                            <input type="text" id="precio_netou" name="precio_netou" class="form-control input-sm">
                        </div>
                        
                         <div  class="form-group">
                            <label>TIPO TASA</label>
                            <select id="tipos_tasas_idu" name="tipos_tasas_idu" class="contenedor">
                                <option>Seleccionar</option>
                               <?php 
                                    foreach ($conn->query($query) as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['descripcion']; ?></option>
                                <?php  }   ?>
                            </select>
                         </div>

                        <div  class="form-group">
                            <label>IMPUESTO INTERNO</label>
                            <input type="text" id="impuesto_internou" name="impuesto_internou" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>BONIFICACIÓN</label>
                            <input type="text" id="bonificacionu" name="bonificacionu" class="form-control input-sm">
                        </div>      
                    </div>
                    <div class="modal-footer fondoNegro">
                        <button type="submit" class="btn btn-primary" data-dismiss="modal" id="actualizadatos">Actualizar</button>
                        <!-- <input type="submit" class="button" value="Crear" name="crear"> -->
                    </div>
            </div>
            </div>
        </div>
    </body>
</html>


        <!-- ******************************************** -->
        
        <script type="text/javascript">
//           document.ready, es para que aparezca lo que sigue inmediatamente despues de leer el html
            $(document).ready(function(){
                $('#tabla_stock').load('componentes/tabla_stock.php'); 
            });
        </script>
        
         <script type="text/javascript">
        $(document).ready(function () { 
            $ ("#modalNuevo").on( 'shown.bs.modal' , function () { 

            $ (this).find('#cod_art').focus(); 

            }); 

        }); 
        </script>





        <script type="text/javascript">
           
           $(document).ready(function(){
                $('#closeform').click(function(){
                         
                    $('#formModal')[0].reset();
                    $('#span').remove();
                  
                });
                
            });
        </script>



        <script type="text/javascript">
            $(document).ready(function(){
                $('#btnguardar').click(function(){ //ANTES DE GUARDAR ARRIBA VERIFICO SI ESTAN TODOS LOS CAMPOS COMPLETOS, HABILITANDO BOTON


                    $(".trColor").removeClass("background-color", "#0420c2");

//******************************************************

//                $('#id').val(d[0]);
                cod_art = $('#cod_art').val();
                descripcion = $('#descripcion').val();
                unidades = $('#unidades').val();
                costo_unitario = $('#costo_unitario').val();
                precio_neto = $('#precio_neto').val();
                tipos_tasas_id = $('#tipos_tasas_id').val();  
                impuesto_interno = $('#impuesto_interno').val();
                bonificacion = $('#bonificacion').val();
         

//******************************************************

                     cadena="cod_art=" + cod_art +
                            "&descripcion=" + descripcion +
                            "&unidades=" + unidades +
                            "&costo_unitario=" + costo_unitario +
                            "&precio_neto=" + precio_neto +
                            "&tipos_tasas_id=" + tipos_tasas_id +
                            "&impuesto_interno=" + impuesto_interno +
                            "&bonificacion=" + bonificacion;

                    
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


       
        
         <script type="text/javascript">
            $(document).ready(function(){
              $('#btnPlusArt').prop('disabled', 'disabled'); 

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
                        $('#adherir').html(resultado)
                        
                     })
                             
               
            });   
                
       
                
   
            });
        </script>

