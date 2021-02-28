
<?php

// include_once 'componentes/value.php';

session_start(); 

  
?>





<table class="table myhover table-condensed table-bordered" id="tablaPlanDeCuenta">
                        
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>CÓDIGO PLAN</td>
                                <td>NIVEL</td>
                                <td>NOMBRE</td>
                                <td>TIPO</td>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php

            

                                $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');


                                if (isset($_SESSION['value'])) {
                                        $value = $_SESSION['value'];

                                        $value =  $value.'%';
                                        
//                                        echo Console::log($value);
                                    //MAS ADELANTE LO HAGO CON UN LIKE ...PERO 
                                    
                                        $query = "SELECT * FROM plandecuenta WHERE codigo like :value ORDER BY codigo";
                                        $stament = $conn->prepare($query);
                                        $stament->bindParam(':value', $value);
                               
                                } else {
                                    $query = "SELECT * FROM plandecuenta ORDER BY nombre";
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



                                                if($array['tipo'] == 1){
                                                    $okey = '✓';
                                                }else{
                                                    $okey = '.';
                                                }
                                                 
                                               
                                            ?>

                                            
                                                <!-- ROW DE LA TABLA QUE SE DESPLIEGA -->

                                                <!-- Si el tipo es 0, entonces desabilitar ese row -->
                                                <tr class="trColor" id="trSelect" disabled>
                                                    <td data-id="<?php echo $array['codigo']; ?>"><?php echo $array['id']; ?></td>
                                                    <td data-id="<?php echo $array['codigo']; ?>"><?php echo $array['codigo']; ?></td>
                                                    <td data-id="<?php echo $array['codigo']; ?>"><?php echo $nivel; ?></td>
                                                    <td data-id="<?php echo $array['codigo']; ?>"><?php echo $array['nombre']; ?></td>
                                                    <td data-id="<?php echo $array['codigo']; ?>"><?php echo $okey; ?></td>
                                                    
                                                </tr>
                                            <?php
                                   }
                                   //FIN DEL FOR
                                    
                                ?>
                        </tbody>
                        
                        
                        
                  
                    </table>
<script type= "text/javascript">
        $(document).ready(function(){
            $('#tablaPlanDeCuenta').DataTable({
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


        <script type="text/javascript">

        $(function () {
            $('#deployAsientos').modal({
                keyboard: true,
                backdrop: "static",
                show: false,

                }).on('show', function () {

                });

            $("#deployAsientos").find('#tabladinamica #trSelect td[data-id]').on('click', function () {

                code = 'code=' + $(this).data('id');// Este es el ID seleccionado de la tabla asientos desplegada 

                setCode(code)



                // alert(code);
                // return false; 

            });


                      
                        
                  


                        });


                  
     
         </script>