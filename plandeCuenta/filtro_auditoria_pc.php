
<?php

?>


    <table class="table table-condensed table-bordered" id="tablaAuditoriaPC">
                        
                        <thead>
                            <tr>
                                <td hidden>ID</td>
                                <td>CÓDIGO PLAN</td>
                                <td>NIVEL</td>
                                <td>NOMBRE</td>
                                <td>TIPO</td>
                                <!--<td>ESTADO</td>-->
                                <td>USUARIO</td>
                                <td>ACCIÓN</td>
                                <td>FECHA</td>
                                <td>HORA</td>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                                
                                $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
                                $query = "SELECT auditoria_plandecuenta.* FROM auditoria_plandecuenta ORDER BY codigo";
                                $stament = $conn->prepare($query);    
                                $stament->execute();

                                foreach ($stament as $array) {
     
//                                   $tipo = $array['tipo'];
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


//                                    }
                                            ?>

                                                <tr class="trColor" id="trSelect">
                                                    <td id="thisCod" hidden><?php echo $array[0]; ?></td>
                                                    <td id="thisCod"><?php echo $array['codigo']; ?></td>
                                                    <td><?php echo $nivel; ?></td>
                                                    <td><?php echo $array['nombre']; ?></td>
                                                    <td><?php echo $array['tipo']; ?></td>
                                                    <td><?php echo utf8_encode($array['usuario']); ?></td>
                                                    <td><?php echo utf8_encode($array['accion']); ?></td>
                                                    <td><?php echo utf8_encode($array['fecha']); ?></td>
                                                    <td><?php echo utf8_encode($array['hora']); ?></td>
                                                </tr>
                                            <?php
                                   }
                                   //FIN DEL FOR
                                    
                                ?>
                        </tbody>

                    </table>
 <script type= "text/javascript">
        $(document).ready(function(){
            $('#tablaAuditoriaPC').DataTable({
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

           
//        
                
        </script>

               