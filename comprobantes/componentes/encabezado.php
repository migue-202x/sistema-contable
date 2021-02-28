<?php

session_start(); 

    date_default_timezone_set('America/Argentina/Buenos_Aires');

    $Today = date("Y-m-d");

    $empresaName = $_SESSION['empresa.nombre'];
    //---------------------------------------------------------------------------------------------------

    $conn2 = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
    $query = "SELECT * FROM puntos_ventas";
    $stament = $conn2->prepare($query);
    $stament->execute();

    $res = $stament->fetch();

    $pto_vta = $res['pto_vta'];
    $descripcion = $res['descripcion'];

    $conn2 = null; 


?>  
                         
                        <div id="numeroDeComprobante" class="form-group invisible" align="right">  
                                    <div class="input-group col-xs-2">
                                         <span id="spanBlue" class="input-group-addon">Nº COMPROBANTE</span>
                                         <input id="num_comprobante" type="text" class="form-control input-lg" size="37" disabled>    
                                    </div>      
                        </div>
                        <br><br>
                        <div class="form-group">  
                             <div class="form-inline"> 
                                      <div class="input-group col-xs-2">
                                            <span id="spanBlack" class="input-group-addon">Nº PTO.VTA</span>
                                             <input id="punto_venta" value="<?php echo $pto_vta;?>" type="text" class="form-control input-lg" size="37" onkeyup="functionDeployPtoVta()">    
                                        </div>

                                     <div class="input-group col-xs-2" style="margin-left: 10px">
                                          <span id="spanBlack" class="input-group-addon">NOMBRE PTO. VTA</span>
                                         <input id="nombre_punto_venta" value="<?php echo $descripcion;?>" type="text" class="form-control input-lg" size="44">
                                     </div>
                              </div> 
                         </div> 
                          <div class="form-group">  
                                <div class="form-inline">        
                                        <div class="input-group col-xs-2">
                                            <span id="spanBlack" class="input-group-addon">Nº CLIENTE</span>
                                            <input id="num_cliente" type="text" class="form-control input-lg" onkeyup="functionDeployClientes()">
                                        </div>
                            
                                         <div class="input-group col-xs-3" style="margin-left: 10px">
                                            <span id="spanBlack" class="input-group-addon">NOMBRE CLIENTE</span>
                                            <input id="nombre_cliente" type="text" class="form-control input-lg" disabled>
                                        </div>
                                </div> 
                        </div>
                        <div class="input-group col-xs-3 invisible" style="margin-left: 10px">
                            <span id="spanBlack" class="input-group-addon">ID CLIENTE</span>
                            <input id="clientes_id" type="text" class="form-control input-lg" disabled>
                        </div>
                               <!------------------------------------------------------------------------------------------------------>         
                           <div class="form-group">  
                                <div class="form-inline"> 
                                        <div class="input-group col-xs-2">
                                            <span id="spanBlack" class="input-group-addon">TIPO COMPROBANTE: </span>
                                            <input id="tipo_comprobante" type="text" class="form-control input-lg" onkeyup="functionDeployTipoComp()">
                                        </div>
                                        <div class="input-group col-xs-2" style="margin-left: 10px">
                                            <span id="spanBlack" class="input-group-addon">PROVINCIA</span>
                                            <input id="prov_cliente" type="text" class="form-control input-lg" size="35" onkeyup="functionDeployProvincias()">    
                                        </div>
 
                                 </div> 
                            </div> 
                            <div class="input-group col-xs-2 invisible" style="margin-left: 10px">
                                             <span id="spanBlack" class="input-group-addon">ID: </span>
                                            <input id="id_comprobante" type="text" class="form-control input-lg" size="35">
                            </div>
                       
                        <div class="form-group">  
                                <div class="form-inline"> 
                                        <div class="input-group col-xs-3">
                                            <span id="spanBlack" class="input-group-addon">SIT. IVA</span>
                                            <input id="tipor_cliente" type="text" class="form-control input-lg" size="35" disabled>
                                        </div>
                            
                                        <div class="input-group col-xs-2" style="margin-left: 10px">
                                            <span id="spanBlack" class="input-group-addon">CUIT</span>
                                            <input id="cuit_cliente" type="text" class="form-control input-lg" disabled>
                                        </div>
                                 </div> 
                            </div> 
               
                            <div class="form-group">  
                                        <div class="input-group col-xs-3">
                                            <span id="spanBlack" class="input-group-addon">FORMA PAGO</span>
                                            <input id="forma_pago" type="text" class="form-control input-lg" size="35" onkeyup="functionDeployFormaPago()">        
                                        </div>
                            </div>   
                               
                            <div class="input-group col-xs-2 invisible">
                                <input id="id_forma_pago" type="text" class="form-control input-lg" size="35">      
                            </div>
                               
                            <div class="form-group">  
                                   <div class="input-group col-xs-2">
                                        <span id="spanBlack" class="input-group-addon">FECHA: </span>
                                        <input id="fecha_contable" type="date" class="form-control input-lg" size="35" value="<?php echo $Today;?>" disabled>
     
                                   </div>
                            </div>   
                               
                               
                               
                               
                               
                              
                               
                            
                       <br> 
                        
                 
     
<script type="text/javascript">
            $(document).ready(function(){
                $('#num_cliente').focus();

            });
</script> 
                