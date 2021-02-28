<?php


 session_start();

//if (isset($_SESSION['consulta'])) {
//    echo 'lleno'; 
//}else
//{
//    echo 'vacio';
//} 
?>







<html>
    <head>
        <meta charset="UTF-8">
        <title>title</title>
        <link rel="stylesheet" href="../estilos/estilos.css">
 
        
<!--        <link rel='stylesheet' type='text/css' href='../lib/glyphicon.css'>
         <link rel='stylesheet' type='text/css' href='../librerias/bootstrap/css/bootstrap.css'> -->
    </head>
    <body class="body">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 align="center" class="h2PDC">Plan de cuenta</h2>
                    <!-- <button id="show" type="text">MOSTRAR</button> -->
                    <table class="table table-hover table-condensed table-bordered tablePC" id="tablaDinamicaLoad">
                        <!-- <caption>
                            <button id="agregaNuevo" class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">Agregar Nuevo <span class="glyphicon glyphicon-plus"></span></button>
                        
                        </caption> -->
                        
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>CÓDIGO PLAN</td>
                                <td>NIVEL</td>
                                <td>NOMBRE</td>
                                <td>TIPO</td>
                                <td>EDITAR</td>

                                <td>ELIMINAR</td>
                                <td></td>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php

            

                                $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');


                                if (isset($_SESSION['consulta'])) {
                                    if ($_SESSION['consulta'] > 0) {
                                        $id = $_SESSION['consulta'];

                                        $query = "SELECT * FROM plandecuenta where id=:id ORDER BY codigo";
                                        $stament = $conn->prepare($query);
                                        $stament->bindParam(':id', $id);
                                    } else {
                                        $query = "SELECT * FROM plandecuenta ORDER BY codigo";
                                        $stament = $conn->prepare($query);
                                    }
                                } else {
                                    $query = "SELECT * FROM plandecuenta ORDER BY codigo";
                                    $stament = $conn->prepare($query);
                                }



                                $stament->execute();

                                

                                //COMINEZO DEL FOR
                                foreach ($stament as $array) {
                                    //No se porque el array $datos NO PUEDE SER ENVIADO EN EL PHP DE ARRIBA, DONDE "Agrego nuevo" 

                                                $datos = $array[0] . "||" .
                                                        $array[1] . "||" .
                                                        $array[2] . "||" .
                                                        $array[3] . "||" .
                                                        $array[4];


                                                $tipo = $array['tipo'];
                                                $codigo = $array['codigo'];
                                                
                                               

 
                                                $cont = 0; 
                                                // Recorremos cada carácter de la cadena

                                                        for($i=0;$i<strlen($codigo);$i++)

                                                        {

                                                                if($codigo[$i] == '.'){
                                                                        $cont = $cont+1;
                                                                }    

                                                        }

                                                       $nivel =  $cont + 1; 



                                                    //    $_SESSION['pepe'] = $nivel; 
                                                 
                                               
                                            ?>

                                    
                                    <?php if ($tipo == 0){?>
                                            
                                                <tr class="rowPink">
                                                    <td><?php echo $array['id']; ?></td>
                                                    <td id="thisCod"><?php echo $array['codigo']; ?></td>
                                                    <td><?php echo $nivel; ?></td>
                                                    <td><?php echo $array['nombre']; ?></td>
                                                    <td><?php echo $array['tipo']; ?></td>
                                                    <td>
                                                        <button class="btn btn-warning" data-toggle="modal" data-target="#modalEdicion" onclick="agregaformEdit('<?php echo $datos; ?>')"><span class="glyphicon glyphicon-pencil"></span></button>
                                                    </td>
                                            <?php 
                                            if ($tipo == 1){
                                                
                                            ?>
                                                    <!--SI ES 1 PUEDE ELIMINAR PERO NO APARECER SUMAR--> 
                                                    <td>
                                                        <button class="btn btn-danger" onclick="pregutarSiNo('<?php echo $array[0]; ?>')"><span class="glyphicon glyphicon-remove"></span></button>
                                                    </td>
                                                    <td>
                                                    
                                                    </td>
                                                    
                                                    <!------------------------------------>
                                                <?php }else{?>
                                                    <td>
                                                    
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-info" data-toggle="modal" data-target="#modalNuevo" onclick="agregaformNew('<?php echo $datos; ?>')"><span class="glyphicon glyphicon-plus"></span></button>
                                                    </td>
                                                    
                                            <?php }?>                                            

                                        
                                                </tr>
                                            <?php
                                   
                                    }else{?>
                                        
                                        <tr class="">
                                                    <td><?php echo $array['id']; ?></td>
                                                    <td id="thisCod"><?php echo $array['codigo']; ?></td>
                                                    <td><?php echo $nivel; ?></td>
                                                    <td><?php echo $array['nombre']; ?></td>
                                                    <td><?php echo $array['tipo']; ?></td>
                                                    <td>
                                                        <button class="btn btn-warning" data-toggle="modal" data-target="#modalEdicion" onclick="agregaformEdit('<?php echo $datos; ?>')"><span class="glyphicon glyphicon-pencil"></span></button>
                                                    </td>
                                            <?php 
                                            if ($tipo == 1){
                                                
                                            ?>
                                                    
                                                    <td>
                                                        <button class="btn btn-danger" onclick="pregutarSiNo('<?php echo $array[0]; ?>')"><span class="glyphicon glyphicon-remove"></span></button>
                                                    </td>
                                                    <td>
                                                    
                                                    </td>
                                                    
                                                    <!------------------------------------>
                                                <?php }else{?>
                                                    <td>
                                                    
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-info" data-toggle="modal" data-target="#modalNuevo" onclick="agregaformNew('<?php echo $datos; ?>')"><span class="glyphicon glyphicon-plus"></span></button>
                                                    </td>
                                                    
                                            <?php }?>                                            

                                        
                                                </tr>
                                                <?php
                                    }
                                }
                                   //FIN DEL FOR
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
    <!-- <script src="../lib/jquery/jquery-1.9.1.min.js"></script>                              -->
    <script type= "text/javascript">
        $(document).ready(function(){
            $('#tablaDinamicaLoad').DataTable({
            language:{
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
                
                
                
            });

            
        });

           
                
        </script>
        
  
            
    

 

