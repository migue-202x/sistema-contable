
<?php

session_start(); 
  
?>





<table class="table table-condensed table-bordered" id="tablaTipoComp">
                        
                        <thead>
                            <tr>
                                <td hidden>ID</td>
                                <td>DESCRIPCIÓN</td>
                                <td>ABREVIACIÓN</td>
                                <td>LIBRO IVA</td>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php

                            $tipo = $_SESSION['tipo']; 
                            
                            $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
                            
                            if($tipo == 'IVA Responsable Inscripto'){
                                $query = "SELECT tipos_comprobantes.* FROM tipos_comprobantes WHERE id IN (1,2,3,4)";
                            }else{
                                $query = "SELECT tipos_comprobantes.* FROM tipos_comprobantes WHERE id IN (5,6,7,8)";
                            }
                            
                            $stament = $conn->prepare($query);
                            $stament->execute();
                                    

                                    
                                 

                                foreach ($stament as $array) {
     
                                            ?>

                                                <tr class="trColor" id="trTipoComp">
                                                    <td data-id="<?php echo $array['id']; ?>"><?php echo $array['descripcion']; ?></td>
                                                    <td data-id="<?php echo $array['id']; ?>"><?php echo $array['abreviacion']; ?></td>
                                                    <td data-id="<?php echo $array['id']; ?>"><?php echo $array['libro_iva']; ?></td>
                                                </tr>
                                            <?php
                                   }
                                   //FIN DEL FOR
                                    
                                ?>
                        </tbody>
                        
                        
                        
                  
                    </table>



                    <script type="text/javascript">
             
                    $(document).ready(function(){
                        $('#deployTComprobantes').modal({
                            keyboard: true,
                            backdrop: "static",
                            show: false,

                            }).on('show', function () {

                            });

                        });
                        
//                        --------------------------------------------------

                        var start = document.getElementById('trTipoComp');
                        console.log(start);
                        start.focus();
                        start.style.backgroundColor = 'green';
                        start.style.color = 'white';
                        function dotheneedful(sibling) {
                            if (sibling != null) {
                                start.focus();
                                start.style.backgroundColor = '';
                                start.style.color = '';
                                start.setAttribute("isselect", "false");
                                sibling.focus();
                                sibling.style.backgroundColor = 'green';
                                sibling.style.color = 'white';
                                sibling.setAttribute("isselect", "true");
                                start = sibling;
                            }
                        }
                        document.onkeydown = checkKey;
                        function checkKey(e) {
                        e = e || window.event;
                        if (e.keyCode == '13') {
                            dotheneedful(start);
                            var codeee = 'code=' + $("#tablaTipoComp").find('tr[isselect="true"]').find('td:eq(0)').data('id');
                            setCodeTComprobantes(codeee)

                            $('#deployTComprobantes').modal('hide');
                            if ($('.modal-backdrop').is(':visible')) {
                              $('body').removeClass('modal-open'); 
                              $('.modal-backdrop').remove(); 
                            };

                            focusFormaPago();
                            console.log($("#tablaTipoComp").find('tr[isselect="true"]'),codeee);
                        }
                        if (e.keyCode == '37') {
                        //up arrow
                        var idx = start.cellIndex;
                        var nextrow = start.parentElement.previousElementSibling;
                        if (nextrow != null) {
                        var sibling = nextrow.cells[idx];
                        dotheneedful(sibling);
                        }
                        } else if (e.keyCode == '39') {
                        //down arrow
                        var idx = start.cellIndex;
                        var nextrow = start.parentElement.nextElementSibling;
                        if (nextrow != null) {
                        var sibling = nextrow.cells[idx];
                        dotheneedful(sibling);
                        }
                        } else if (e.keyCode == '38') { 
                        //HACIA ARRIBA
                        var sibling = start.previousElementSibling;
                        dotheneedful(sibling);
                        } else if (e.keyCode == '40') {
                        //HACIA ABAJO
                        var sibling = start.nextElementSibling;
                        dotheneedful(sibling);
                        }
            //             }else if (e.keyCode == '13') {
            //               console.log(ElementSibling);
            //               return false; 
            //             }
                        }

         </script>
