
<?php

// include_once 'componentes/value.php';

session_start(); 
  

  
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

    
    <!-- FECHA -->
        <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
 

        
        <script src="../lib/jquery/jquery-1.9.1.min.js"></script>
        <script src="js/asientofunciones.js"></script>
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

<!-- FECHA -->
        <script src="js/bootstrap-datetimepicker.min.js"></script>
       

    </head>
    <header>
        <div id="header">
                    <ul class="nav navbar-nav">

                        <li><a class="a btn btn-primary btn-lg" href="../contabilidad.php">SALIR</a></li>
    
                            
                    </ul>
        </div>  

    </header>
   
    
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

        <br><br><br>
    


        <div>       
            <!----------------------------------------------------------------------->
            <div id="menuselect"></div>
            <!----------------------------------------------------------------------->
                <br><br>

            <div class="containerExt classext">

                <br><br><br>
                <div class="containerInt classint">
                <br>
                        <div class="classint">
                            <br>
                            <div id="encabezado"></div>
                        </div>
                <br>
                </div>
            </div>
            
            <!------------------------------------------------------------------------>
            <div id="tabla"></div> 
            <!------------------------------------------------------------------------->
        </div>
        
        <!-- ******************************************* -->

        <!-- Modal para registr2os nuevos -->
     <!--<div class="form-group has-error">--> 
        <div class="modal fade" id="deployAsientos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" id="widthModalPlanCuenta" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" id="closeform" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel" align="center">PLAN DE CUENTAS</h4>
                    </div>
                     <div class="container-fluid">
                            <div class="row-fluid">
                                <div id="tabladinamica"></div>
                            </div>
                      </div>
                </div>
            </div>
        </div>
    <!--</div>-->     

       
        <!-- Modal para edicion de datos -->
        
        <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar datos</h4>
            </div>
            <div class="modal-body">
                <input type="text" id="idplandecuenta" hidden="">
                
                <div  class="form-group">
                    <label>CÓDIGO PLAN</label>
                    <!-- <input type="text" id="codigoplanu"  class="form-control input-sm" disabled>    -->
                    <input type="text" id="codigoplanu"  class="form-control input-sm">       
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


        <!-- ******************************************** -->
        
        <script type="text/javascript">
            $(document).ready(function(){
//POR DEFECTO VOY A TENER EL MENU Y LA TABLA
                $('#menuselect').load('componentes/selectmenu.php');
                $('#encabezado').load('componentes/encabezado.php');
                $('#tabla').load('componentes/tabla.php'); 
                
            });
        </script>


        <script type="text/javascript">
           
           $(document).ready(function(){
                $('#closeform').click(function(){
                    
                    $('#deploy').val('');
                          jQuery(this).removeData('bs.modal');
                });
                
            });

        </script>
        
        
        <script>

            $(document).on('click', 'tbody .trColor', function () {
            $(this).addClass('activeColour').siblings().removeClass('activeColour');
            });  

        </script>

    </body>
    
</html>








