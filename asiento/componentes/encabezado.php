<?php

session_start(); 

  
//--------------------------------------------------------------------

$empresaName = $_SESSION['empresa.nombre'];


$conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
$query = "SELECT mayor.ult_fecha AS fecha FROM mayor";
$stament = $conn->prepare($query);
$stament->execute();

$res = $stament->fetch();

$fecha = $res['fecha'];

$setFecha = date("Y-m-d",strtotime($fecha."+ 1 days")); 

$conn = null; 




?>


  <div class="form-group">

                    <br>
                    <div class="form-inline">                  
                        <div class="form-group">  
                                        <div class="input-group col-xs-2">
                                            <span id="spanGreen" class="input-group-addon">Nº ASIENTO</span>
                                             <input id="inputSeat" type="text" class="form-control input-lg" size="37" disabled>    
                                        </div>


                                        <div class="input-group col-xs-3">
                                            <span id="spanGreen" class="input-group-addon">FECHA CONTABLE: </span>
                                            <input id="fechaContableNew" min="<?php echo $setFecha?>" type="date" class="form-control input-lg" size="35">

                                        </div> 

                            <?php if((isset($_SESSION['typeApertura'])) && (isset($_SESSION['typeCierre']))){?>
                                        <div class="input-group mb-3">
                                          <input id="inputTypeSeat" type="text" class="form-control input-lg" disabled value="Asiento Normal"> 
                                        </div>  

                            <?php }elseif(isset($_SESSION['typeCierre'])){?>
                                        <div class="input-group mb-3">                                   
                                                <div class="dropdown">
                                                        <input id="inputTypeSeat" type="text" class="form-control input-lg" disabled value="Asiento Normal"> 
                                                        <button id="btnTypeSeat" class="btn btn-success btn-lg dropdown-toggle input-group-prepend" type="button" data-toggle="dropdown">Tipo asiento<span class="caret"></span></button>


                                                    <ul id="myUl" class="dropdown-menu navbar-nav">  
                                                        <li id="seatApertura" data-id="Asiento Apertura" class="pointer"><a tabindex="-1">1- ASIENTO APERTURA</a></li>   
                                                        <li id="seatNormal" data-id="Asiento Normal" class="pointer"><a tabindex="-2">2- ASIENTO NORMAL</a></li>   
                                                    </ul>
                                                </div>    
                                        </div>  

                            <?php }elseif(isset($_SESSION['typeApertura'])){ ?>

                                        <div class="input-group mb-3">

                                           <div class="dropdown">
                                                        <input id="inputTypeSeat" type="text" class="form-control input-lg" disabled value="Asiento Normal"> 
                                                        <button id="btnTypeSeat" class="btn btn-success btn-lg dropdown-toggle input-group-prepend" type="button" data-toggle="dropdown">Tipo asiento<span class="caret"></span></button>


                                               <ul id="myUl" class="dropdown-menu navbar-nav">
                                                   <li id="seatNormal" data-id="Asiento Normal" class="pointer"><a tabindex="-1">1- ASIENTO NORMAL</a></li>   
                                                   <li id="seatCierre" data-id="Asiento Cierre" class="pointer"><a tabindex="-2">2- ASIENTO CIERRE</a></li>   

                                               </ul>
                                            </div>    
                                        </div>  


                            <?php }else{?>
                                        <div class="input-group mb-3">                                  
                                                <div class="dropdown">
                                                        <input id="inputTypeSeat" type="text" class="form-control input-lg" disabled value="Asiento Normal"> 
                                                        <button id="btnTypeSeat" class="btn btn-success btn-lg dropdown-toggle input-group-prepend" type="button" data-toggle="dropdown">Tipo asiento<span class="caret"></span></button>


                                                    <ul id="myUl" class="dropdown-menu navbar-nav">  
                                                        <li id="seatApertura" data-id="Asiento Apertura" class="pointer"><a tabindex="-1">1- ASIENTO APERTURA</a></li>   
                                                        <li id="seatNormal" data-id="Asiento Normal" class="pointer"><a tabindex="-2">2- ASIENTO NORMAL</a></li>   
                                                        <li id="seatCierre" data-id="Asiento Cierre" class="pointer"><a tabindex="-3">3- ASIENTO CIERRE</a></li>   

                                                    </ul>  
                                                </div>    
                                        </div>  



                            <?php }?>

                        </div> 
                       <br> 
                        
                 
                    </div>
                </div>



    